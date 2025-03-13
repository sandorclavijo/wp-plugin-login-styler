<?php
/**
 * Plugin Name: Login Styler
 * Plugin URI: https://trypage.net/wp/plugins
 * Description: Customize the logo and colors of the WordPress login page.
 * Version: 1.0
 * Author: Sandor Clavijo
 * Author URI: https://trypage.net/wp/plugins
 * License: GPL2
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Evitar el acceso directo al archivo
}

// Crear la clase para el plugin
class Custom_Login_Styles {

    // Constructor para registrar acciones
    public function __construct() {
        add_action( 'login_enqueue_scripts', array( $this, 'add_custom_styles' ) );
        add_filter( 'login_headerurl', array( $this, 'custom_login_url' ) );
        add_filter( 'login_headertitle', array( $this, 'custom_login_title' ) );
    }

    // Método para añadir estilos personalizados
    public function add_custom_styles() {
        ?>
        <style type="text/css">
            /* Personalizar el logo */
            #login h1 a {
                /*background-image: url(<?php echo esc_url( plugin_dir_url( __FILE__ ) . 'assets/images/logo.png' ); ?>) !important;*/
				background-image:url(data:image/png;base64,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UmVhZHlxyWU8AAADJmlUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS42LWMwNjcgNzkuMTU3NzQ3LCAyMDE1LzAzLzMwLTIzOjQwOjQyICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIiB4bWxuczpzdFJlZj0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL3NUeXBlL1Jlc291cmNlUmVmIyIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ0MgMjAxNSAoV2luZG93cykiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6QTEzMTRBNDBGRjdGMTFFRkE4OTBBQUFCNzUwMUNCRjQiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6QTEzMTRBNDFGRjdGMTFFRkE4OTBBQUFCNzUwMUNCRjQiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDpBMTMxNEEzRUZGN0YxMUVGQTg5MEFBQUI3NTAxQ0JGNCIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDpBMTMxNEEzRkZGN0YxMUVGQTg5MEFBQUI3NTAxQ0JGNCIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/Pk0L2fIAABSBSURBVHjaYmSAgqCgEAZ+ISGGv3//KP1nYNzEyMhgxPDv3y9WNjYGWSlJBiaYQm5+/n9//v79D1R0F8jVBjJ+/mdk+v/j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);
                background-size: contain;
                width: 320px;
                height: 80px;
            }

            /* Personalizar colores */
            body {
                background-color: #f0f0f0;
            }
            #login {
                background-color: #f0f0f0;
            }
            #login input[type="text"], #login input[type="password"] {
                background-color: #f9f9f9;
                border: 1px solid #ccc;
            }
            #login input[type="submit"] {
                background-color: #0073aa;
                border-color: #006799;
            }
            #login input[type="submit"]:hover {
                background-color: #006799;
                border-color: #005577;
            }
        </style>
        <?php
    }

    // Método para personalizar el URL del logo
    public function custom_login_url() {
        return home_url(); // Cambia el URL del logo si lo deseas
    }

    // Método para personalizar el título del logo
    public function custom_login_title() {
        return get_bloginfo( 'name' ); // Título del logo (puedes personalizarlo)
    }
}

// Inicializar el plugin
new Custom_Login_Styles();
