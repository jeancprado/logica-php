$(document).ready(function(){

    $("#enviar").click(function(){
        let temp = $("#temperature").val();

        $.ajax({
            url: "src/api.php",
            type: "POST",
            data: { temperature: temp },
            dataType: "json",
            success: function(res){

                if(res.erro){
                    $("#mensagem").html('<span style="color:red">' + res.erro + '</span>');
                    return;
                }

                if(res.final){
                    $("#resultado").show();
                    $(".card:first").hide(); 

                    if(res.total == 0){
                        $("#resumo").html("Nenhum dado registrado.");
                        return;
                    }

                    $("#resumo").html(`
                        <div class="resumo-item">Total: ${res.total}</div>
                        <div class="resumo-item">Frias: ${res.frias}</div>
                        <div class="resumo-item">Agradáveis: ${res.agradaveis}</div>
                        <div class="resumo-item">Quentes: ${res.quentes}</div>
                        <div class="resumo-item">Média: ${res.media}°C</div>
                        <div class="resumo-item">Mínima: ${res.min}°C</div>
                        <div class="resumo-item">Máxima: ${res.max}°C</div>
                    `);
                    
                    $("#tabela").html("");

                    res.dados.forEach(function(item, index){
                        let classe = "";
                        let tempNum = parseFloat(item.temperature); 

                        if(tempNum < 15) classe = "temp-fria";
                        else if(tempNum > 30) classe = "temp-quente";
                        else classe = "temp-agradavel";

                        $("#tabela").append(`
                            <tr class="${classe}">
                                <td>${index+1}</td>
                                <td>${item.temperature}°C</td>
                                <td>${item.classification}</td>
                                <td>${item.data_formatada}</td> 
                            </tr>
                        `);
                    });

                } else {
                    $("#mensagem").html('<span style="color:green">Temperatura salva com sucesso!</span>');
                    $("#temperature").val("").focus();
                    
                    setTimeout(function(){ $("#mensagem").html(""); }, 2000);
                }
            },
            error: function(){
                $("#mensagem").text("Erro de comunicação com o servidor.");
            }
        });
    });

    $("#limpar").click(function(){
        if(confirm("Tem certeza que deseja apagar tudo?")){
            $.ajax({
                url: "src/api.php",
                type: "POST",
                data: { limpar: true },
                dataType: "json",
                success: function(res){
                    if(res.limpo){
                        alert("Dados apagados com sucesso!");
                        location.reload();
                    }
                }
            });
        }
    });

    $("#voltar").click(function(){
        location.reload();
    });

});