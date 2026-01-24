<?php
/**
 * Astra Child Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Astra Child
 * @since 1.0.0
 */

/**
 * Enqueue styles
 */
function child_enqueue_styles() {
	wp_enqueue_style( 'astra-child-theme-css', get_stylesheet_directory_uri() . '/style.css', array('astra-theme-css'), wp_get_theme()->get('Version') );
}
add_action( 'wp_enqueue_scripts', 'child_enqueue_styles' );

// --- Adicione seus códigos personalizados abaixo desta linha ---

/**
 * 1. Botão Flutuante do WhatsApp (Atualizado e Otimizado para Conversão)
 */
function ikarosites_add_whatsapp_button() {
    // Número atualizado
    $whatsapp_number = '5533999483324';
    $whatsapp_url = 'https://wa.me/' . preg_replace( '/[^0-9]/', '', $whatsapp_number );
    ?>
    <style>
        .whatsapp-float {
            position: fixed;
            width: 60px;
            height: 60px;
            bottom: 40px;
            right: 40px;
            background-color: #25d366;
            color: #FFF;
            border-radius: 50px;
            text-align: center;
            font-size: 30px;
            box-shadow: 2px 2px 6px rgba(0,0,0,0.3);
            z-index: 1000;
            transition: transform 0.3s ease-in-out;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .whatsapp-float:hover {
            transform: scale(1.1);
            background-color: #128C7E; /* Cor mais escura no hover (Padrão UX) */
        }
        .whatsapp-float svg {
            width: 35px;
            height: 35px;
            fill: white;
        }
    </style>
    <a href="<?php echo esc_url( $whatsapp_url ); ?>" class="whatsapp-float" target="_blank" rel="noopener noreferrer" aria-label="Fale conosco pelo WhatsApp">
        <!-- Ícone FontAwesome SVG Otimizado -->
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-26.5l-6.7-4.2-69.8 18.3 18.6-68.1-4.4-6.9c-18.3-29.5-28-64-28-100.3 0-101.9 82.8-183.5 183.8-183.5 49.1 0 93.3 19.1 127.9 53.8 34.7 34.7 53.8 78.9 53.8 127.9 0 101.9-82.4 183.5-183.8 183.5zm101.8-137.8c-5.6-2.8-33-16.3-38.1-18.1-5.1-1.7-8.8-2.6-12.5 2.8-3.7 5.6-14.3 18.1-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.6 5.7-9.1 16.3-30.3 1.8-3.7 .9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 47.2s19.9 55.5 22.6 59.2c2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 33-13.4 37.6-26.5 4.6-13.1 4.6-24.4 3.2-26.5-1.4-2.1-5.1-3.3-10.7-6.1z"/></svg>
    </a>
    <?php
}
add_action( 'wp_footer', 'ikarosites_add_whatsapp_button' );

/**
 * 2. CSS Global: Correções de Logo, Animações e Responsividade
 */
function ikarosites_add_custom_css() {
    ?>
    <style>
        /* --- Correção da Logo --- */
        /* Garante que a logo tenha tamanho se for SVG e visibilidade se for branca */
        .site-logo img, .custom-logo-link img, .elementor-widget-theme-site-logo img {
            max-width: 100%;
            height: auto;
            min-width: 150px; /* Garante visibilidade mínima */
            filter: drop-shadow(0px 0px 2px rgba(0,0,0,0.5)); /* Sombra para destacar logo branca em fundo branco */
        }
        
        /* --- Otimização Mobile (Celular) --- */
        /* Oculta o texto do nome da empresa em telas pequenas, mantendo apenas Logo e Menu */
        @media (max-width: 768px) {
            .site-title, 
            .site-description, 
            .ast-site-title-wrap .site-title,
            .elementor-widget-theme-site-title {
                display: none !important;
            }
            .site-header .site-logo-img {
                display: block !important;
            }
            /* Ajustes Gerais de Texto Mobile (Responsividade) */
            h1, h2, h3, .elementor-heading-title {
                font-size: 1.5rem !important;
                line-height: 1.3 !important;
                word-wrap: break-word;
            }
            .elementor-section-wrap, .elementor-column-wrap {
                padding-left: 10px !important;
                padding-right: 10px !important;
            }
        }

        /* --- Animações de Scroll (Fade In Up) --- */
        /* Classe adicionada via JS abaixo */
        .ikaros-animate-on-scroll {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.8s ease-out, transform 0.8s ease-out;
        }
        .ikaros-animate-on-scroll.is-visible {
            opacity: 1;
            transform: translateY(0);
        }
        
        /* Efeito de Imagens se Unindo (Merge) ao Rolar */
        .ikaros-merge-left {
            transform: translateX(-50px);
            opacity: 0;
            transition: all 1s ease;
        }
        .ikaros-merge-right {
            transform: translateX(50px);
            opacity: 0;
            transition: all 1s ease;
        }
        .ikaros-merge-left.is-visible, .ikaros-merge-right.is-visible {
            transform: translateX(0);
            opacity: 1;
        }

        /* --- Responsividade Melhorada --- */
        @media (max-width: 768px) {
            h1, .elementor-heading-title {
                font-size: 1.8rem !important; /* Títulos menores no mobile para não quebrar */
            }
            .elementor-section {
                padding-left: 15px !important;
                padding-right: 15px !important;
            }
        }

        /* Efeito de Overlay Colorido (use a classe .ikaros-overlay-effect no Elementor) */
        .ikaros-overlay-effect .elementor-widget-container {
            position: relative;
            overflow: hidden;
        }
        .ikaros-overlay-effect .elementor-widget-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(113, 44, 247, 0.6); /* Cor do overlay (Roxo) - altere se quiser */
            opacity: 0;
            transition: opacity 0.4s ease;
            z-index: 1;
            pointer-events: none;
        }
        .ikaros-overlay-effect:hover .elementor-widget-container::before {
            opacity: 1;
        }

        /* Estilo para links de contato */
        .ikaro-email-link {
            font-weight: 600;
            color: inherit;
        }
    </style>
    <?php
}
add_action( 'wp_head', 'ikarosites_add_custom_css' );

/**
 * 3. Script JS para Animações ao Rolar (Scroll)
 * Faz com que imagens e textos apareçam suavemente quando o usuário desce a página.
 */
function ikarosites_add_scroll_script() {
    ?>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Seleciona widgets principais do Elementor para animar
            const targets = document.querySelectorAll('.elementor-widget-image, .elementor-widget-heading, .elementor-widget-text-editor, .elementor-widget-button, .ikaros-merge-left, .ikaros-merge-right');
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                    }
                });
            }, { threshold: 0.1 }); // Dispara quando 10% do elemento está visível

            targets.forEach(target => {
                target.classList.add('ikaros-animate-on-scroll');
                observer.observe(target);
            });
        });
    </script>
    <?php
}
add_action( 'wp_footer', 'ikarosites_add_scroll_script' );

/**
 * 4. Shortcodes para Informações de Contato (Email e Empresa)
 * Use estes códigos dentro dos widgets de Texto ou Título do Elementor.
 */

// Use: [ikaro_email]
function ikarosites_email_shortcode() {
    return '<a href="mailto:ikarosistemas@gmail.com" class="ikaro-email-link">ikarosistemas@gmail.com</a>';
}
add_shortcode( 'ikaro_email', 'ikarosites_email_shortcode' );

// Use: [ikaro_contato]
function ikarosites_contact_shortcode() {
    return '<div class="ikaro-contact-info">
        <p><strong>Ikarosites - Soluções Digitais</strong></p>
        <p>Email: <a href="mailto:ikarosistemas@gmail.com">ikarosistemas@gmail.com</a></p>
        <p>WhatsApp: <a href="https://wa.me/5533999483324" target="_blank">(33) 99948-3324</a></p>
    </div>';
}
add_shortcode( 'ikaro_contato', 'ikarosites_contact_shortcode' );

/**
 * 5. Shortcodes de Padronização (Ano e Endereço)
 */

// Use: [ikaro_ano] - Retorna o ano atual automaticamente (ex: 2026)
function ikarosites_year_shortcode() {
    return date( 'Y' );
}
add_shortcode( 'ikaro_ano', 'ikarosites_year_shortcode' );

// Use: [ikaro_endereco]
function ikarosites_address_shortcode() {
    return 'Governador Valadares, MG - Atendimento Global'; // Edite aqui para mudar no site todo
}
add_shortcode( 'ikaro_endereco', 'ikarosites_address_shortcode' );

/**
 * 6. Otimização de Performance e Segurança (Padrão Engenharia)
 */

// Remove a versão do WordPress do cabeçalho (Segurança: dificulta identificação de versão para ataques)
remove_action('wp_head', 'wp_generator');

// Remove scripts de Emojis do WordPress (Performance: menos JS/CSS para carregar)
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

// Permite upload de arquivos SVG (Design: Logos vetoriais nítidas)
function ikarosites_allow_svg_upload( $mimes ) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter( 'upload_mimes', 'ikarosites_allow_svg_upload' );

/**
 * 7. Shortcodes de Copywriting e Vendas (Padronização)
 * Substitua os textos no Elementor por estes códigos para atualizar o site todo.
 */

// Hero Section (Topo)
add_shortcode('ikaro_hero_titulo', function() { return 'Transforme Visitantes em Clientes Reais'; });
add_shortcode('ikaro_hero_subtitulo', function() { return 'Engenharia de Software aplicada ao seu negócio. Sites rápidos, seguros e feitos para vender.'; });
add_shortcode('ikaro_cta_botao', function() { return 'Quero um Orçamento'; });

// Seção de Serviços (Use em widgets de Texto)
add_shortcode('ikaro_servico_1', function() { return '<h3>Lojas Virtuais (E-commerce)</h3><p>Venda 24h por dia com uma loja segura, integrada ao seu estoque e meios de pagamento.</p>'; });
add_shortcode('ikaro_servico_2', function() { return '<h3>Sites Institucionais</h3><p>Fortaleça sua marca com um site profissional que passa autoridade e confiança imediata.</p>'; });
add_shortcode('ikaro_servico_3', function() { return '<h3>Dashboards & BI</h3><p>Tome decisões baseadas em dados. Monitoramento em tempo real do seu negócio.</p>'; });

// Seção Sobre
add_shortcode('ikaro_sobre_titulo', function() { return 'Mais que um site, uma estratégia.'; });
add_shortcode('ikaro_sobre_texto', function() { return 'Na Ikarosites, unimos design moderno com a robustez da engenharia de software. Não entregamos apenas código, entregamos resultados de vendas e performance.'; });

// Segurança Extra: Desativa XML-RPC (Proteção contra ataques de força bruta)
add_filter( 'xmlrpc_enabled', '__return_false' );
