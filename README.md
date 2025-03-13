# Login Styler Plugin Wordpress
Plugin de WordPress que permite personalizar la página de inicio de sesión, reemplazando el logo predeterminado y modificando los colores de fondo, botones y campos mediante CSS

## Características

- **Logo Personalizado:** Cambia el logo predeterminado de WordPress por uno personalizado.
- **Colores Personalizados:** Modifica los colores de fondo, los campos de entrada y los botones de la página de login.
- **URL del Logo Personalizado:** Cambia el enlace del logo a la URL de tu sitio o cualquier otra URL de tu elección.
- **Título del Logo Personalizado:** Puedes modificar el título que aparece cuando pasas el cursor sobre el logo en la página de inicio de sesión.

## Requisitos

- WordPress 4.0 o superior.
- Acceso de administrador a tu instalación de WordPress para activar el plugin.

## Instalación

1. **Descarga el Plugin:**
   - Puedes descargar este plugin como un archivo ZIP desde GitHub o clonar el repositorio directamente.
   
2. **Sube el Plugin a WordPress:**
   - Extrae el contenido del archivo ZIP y sube la carpeta `custom-login-styles` al directorio `wp-content/plugins/` de tu instalación de WordPress.

3. **Activa el Plugin:**
   - Ve al panel de administración de WordPress.
   - Dirígete a **Plugins > Plugins instalados**.
   - Activa el plugin **Login Styler**.

4. **Configura el Logo Personalizado:**
   - Sube tu imagen de logo personalizada dentro de la carpeta `assets/images/` en el directorio del plugin.
   - El logo debe llamarse `custom-logo.png`. Si deseas cambiar el nombre del archivo, asegúrate de actualizar el código del plugin en el método `add_custom_styles()`.

## Personalización

- Puedes modificar los colores y estilos de la página de inicio de sesión directamente en el archivo `custom-login-styles.php` dentro de la clase `Custom_Login_Styles`, específicamente en el método `add_custom_styles`.
  
- Si deseas personalizar aún más el comportamiento del plugin (por ejemplo, agregar una página de opciones en el panel de administración), necesitarás extender el plugin con más características.

## Contribuciones

Si encuentras errores o deseas sugerir mejoras, siéntete libre de abrir un **Issue** o enviar un **Pull Request**.

## Licencia

Este plugin está licenciado bajo la **Licencia GPL 2.0**.

