<!DOCTYPE html>
<html>
<head>
  <title>Formulario de Recetas</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>

<style>
    /* Estilos para el formulario */
body {
  font-family: Arial, sans-serif;
  margin: 30px;
}

h1 {
  text-align: center;
}

.form-group {
  margin-bottom: 20px;
}

label {
  font-weight: bold;
}

input[type="text"],
textarea,
select {
  width: 100%;
  padding: 8px;
  border-radius: 5px;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

input[type="submit"] {
  padding: 10px 20px;
  background-color: #4CAF50;
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-size: 16px;
}

input[type="submit"]:hover {
  background-color: #45a049;
}

</style>

<h1>Formulario de Recetas</h1>

<form action="/guardar_receta" method="post">
  <div class="form-group">
    <label for="nombre_receta">Nombre de la receta:</label><br>
    <input type="text" id="nombre_receta" name="nombre_receta" required><br><br>
  </div>

  <div class="form-group">
    <label for="ingredientes">Ingredientes:</label><br>
    <textarea id="ingredientes" name="ingredientes" rows="4" cols="50" required></textarea><br><br>
  </div>

  <div class="form-group">
    <label for="instrucciones">Instrucciones:</label><br>
    <textarea id="instrucciones" name="instrucciones" rows="8" cols="50" required></textarea><br><br>
  </div>

  <div class="form-group">
    <label for="tiempo_preparacion">Tiempo de preparación:</label><br>
    <input type="text" id="tiempo_preparacion" name="tiempo_preparacion"><br><br>
  </div>

  <div class="form-group">
    <label for="dificultad">Dificultad:</label><br>
    <select id="dificultad" name="dificultad">
      <option value="facil">Fácil</option>
      <option value="intermedia">Intermedia</option>
      <option value="dificil">Difícil</option>
    </select><br><br>
  </div>

  <input type="submit" value="Guardar receta">
</form>

</body>
</html>
