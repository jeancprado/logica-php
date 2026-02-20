$(document).ready(function(){

    $("#enviar").click(function(){
                // LIMPAR DADOS
// LIMPAR DADOS SEM REFRESH
$("#limpar").click(function(){

    $.ajax({
        url: "src/api.php",
        type: "POST",
        data: { limpar: true },
        dataType: "json",
        success: function(res){

            if(res.limpo){

                // Limpa tabela
                $("#tabela").html("");

                // Limpa resumo
                $("#resumo").html("");

                // Esconde resultado
                $("#resultado").hide();

                // Limpa mensagem
                $("#mensagem").html("");

                // Limpa input
                $("#temperature").val("");

                alert("Dados apagados com sucesso!");
            }
        }
    });

});

        // VOLTAR AO INÍCIO
        $("#voltar").click(function(){
            location.reload();
        });

        let temp = $("#temperature").val();

        $.ajax({
            url: "src/api.php",
            type: "POST",
            data: { temperature: temp },
            dataType: "json",
            success: function(res){

                if(res.erro){
                    $("#mensagem").html(res.erro);
                    return;
                }

                if(res.final){

                    $("#resultado").show();

                    $("#resumo").html(`
                        <div class="resumo-item">Total<br>${res.total}</div>
                        <div class="resumo-item">Frias<br>${res.frias}</div>
                        <div class="resumo-item">Agradáveis<br>${res.agradaveis}</div>
                        <div class="resumo-item">Quentes<br>${res.quentes}</div>
                        <div class="resumo-item">Média<br>${res.media}°C</div>
                        <div class="resumo-item">Mínima<br>${res.min}°C</div>
                        <div class="resumo-item">Máxima<br>${res.max}°C</div>
                    `);
                    
                    $("#tabela").html("");

                    res.dados.forEach(function(item, index){

                        let classe = "";

                        if(item.temperature < 15)
                            classe = "temp-fria";
                        else if(item.temperature > 30)
                            classe = "temp-quente";
                        else
                            classe = "temp-agradavel";

                        $("#tabela").append(`
                            <tr class="${classe}">
                                <td>${index+1}</td>
                                <td>${item.temperature}°C</td>
                                <td>${item.classification}</td>
                                <td>${item.registration_date}</td>
                            </tr>
                        `);
                    });

                } else {
                    $("#mensagem").html("Temperatura salva com sucesso!");
                    $("#temperature").val("");
                }
            }
        });

    });

});