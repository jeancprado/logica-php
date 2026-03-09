<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Avaliação de Treinos</title>

<link rel="stylesheet" href="css/style.css">

</head>

<body>

<div class="container">

<h1>Sistema de Avaliação de Treinos</h1>
<p class="subtitulo">Avalie seu desempenho semanal</p>

<form class="form-avaliacao">

<label>Carga Média Levantada (kg)</label>
<input type="number" min="0" max="200" placeholder="Ex: 120">

<label>Número de Treinos na Semana</label>
<input type="number" min="0" max="7" placeholder="Ex: 5">

<label>Nota de Dedicação</label>
<input type="number" step="0.1" min="0" max="10" placeholder="Ex: 9.5">

<button type="submit">Avaliar Desempenho</button>

</form>


<div class="resultado">

<h2>Resultado da Avaliação</h2>

<p class="mensagem">
Aqui aparecerá a classificação do desempenho após o processamento pelo PHP.
</p>

</div>


<div class="historico">

<h2>Histórico de Avaliações</h2>

<table>

<thead>
<tr>
<th>ID</th>
<th>Carga</th>
<th>Treinos</th>
<th>Dedicação</th>
<th>Classificação</th>
<th>Data</th>
</tr>
</thead>

<tbody>

<tr>
<td>2</td>
<td>120kg</td>
<td>6</td>
<td>9.5</td>
<td class="lendario">Desempenho Lendário</td>
<td>2026-02-24 10:55</td>
</tr>

<tr>
<td>1</td>
<td>80kg</td>
<td>4</td>
<td>7.0</td>
<td class="bom">Desempenho Bom</td>
<td>2026-02-17 09:30</td>
</tr>

</tbody>

</table>

</div>

</div>

</body>
</html>