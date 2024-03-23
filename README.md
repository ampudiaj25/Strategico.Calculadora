# Strategico.Calculadora
Prueba práctica de desarrollo para la solucion de una aplicación web que permite ejecutar operaciones básicas de una calculadora.

# Estructura del proyecto:
Se implemento el patron MVC 
1. code/strategico.calculator.front: se encuentra el proyecto con el front de la solución
2. code/strategico.calculator.control: se encuentra el controlador con la logica de negocio y el llamado de la API externa
3. code/strategico.calculator.api: se encuentra el API donde esta el servicio con el modelo y los metodos de las operaciones matematicas

# Cómo ejecutar y Probar el proyecto
1. Se debe instalar XAMPP(https://www.apachefriends.org/es/download.html)
2. Ejecutar el servicio de apache
3. En la carpeta htdocs ubicar las carpetas strategico.calculator.front, strategico.calculator.control y strategico.calculator.api
4. Abrir el navegador y poner http://localhost/strategico.calculator.front/

# Decisiones de diseño
Para el front estos son los aspectos relevantes:
1. HTML para crear el formulario
2. Bootstrap para los estilos
3. Jquery para las validaciones
4. AJAX para el llamado al controlador

Para el controlador estos son los aspectos relevantes:
1. PHP para el desarrollo del servicio
2. Control de errores

Para el API estos son los aspectos relevantes:
1. PHP para el desarrollo del servicio
2. Control de errores
3. Para las operaciones matematicas se diseño un modelo mediante una interface la cual fue implementada por las clases correspondientes a las operaciones que se requieren, permitiendo asi que el codigo sea modificable y se pueda extender



