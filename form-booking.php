<!-- BEGIN BOOKING -->
<style>
    #main-booking-container .sb-custom-color-hover:hover{color: rgba(105, 61, 21, 1) !important;fill: rgba(105, 61, 21, 1) !important;}
    #main-booking-container .sb-custom-widget-color{color: #000000 !important;}
    #main-booking-container .sb-custom-widget-bg-color{background: rgba(255,255,255,1) !important;-webkit-border-radius: 0;-moz-border-radius: 0;border-radius: 0;}
    #main-booking-container .sb-custom-label-color, #main-booking-container .sb-custom-label-hover:hover .sb-custom-label-hover-color{color: #000000 !important;}
    .themo_room-template-default #main-booking-container .sb-custom-label-color, .themo_room-template-default #main-booking-container .sb-custom-label-hover:hover .sb-custom-label-hover-color{color: #000000 !important;}
    #main-booking-container .sb__footer-promo  .sb-custom-label-color{color: #000000 !important;}
    #main-booking-container .sb__footer-promo-wrapper .sb-custom-widget-bg-color{background: white !important;}
    #main-booking-container .sb__guests{padding-top: 40px;}
    #main-booking-container .sb__guests-room:last-child .sb__guests-add-room{position: absolute;top: 10px;right: 15px;}
    #main-booking-container .sb__guests-add-room, #main-booking-container .sb__guests-add-room .sb-custom-icon-color{fill: #016864 !important;color: #016864 !important;}
    #main-booking-container .sb-custom-link-color, #main-booking-container .sb-custom-link-color:hover{color: #000000 !important;}
    .themo_room-template-default #main-booking-container .sb-custom-link-color, .themo_room-template-default #main-booking-container .sb-custom-link-color:hover{color: #000000 !important;}
    #main-booking-container #main-booking-container_sb__footer-promo-wrapper .sb-custom-icon-color{color: #000000 !important;fill: #000000 !important;}
    .themo_room-template-default #main-booking-container #main-booking-container_sb__footer-promo-wrapper .sb-custom-icon-color{color: #000000 !important;fill: #000000 !important;}
    #main-booking-container .sb-custom-link-color {text-decoration: none;}
    .sb__form-field{width: 100%;}
    .sb__form-field-label{color: #000000 !important;}
    .sb__form-field-input, .sb__btn{-webkit-border-radius: 0 !important;-moz-border-radius: 0 !important;border-radius: 0 !important;border: 1px solid #000000;}
    .sb__form-field-input {width: 100%;position: relative;cursor: pointer;border-color: rgb(237, 156, 40) !important;box-shadow: none !important;background: #fff !important;background-color: rgb(255, 255, 255) !important;}
    .hotel-booking-form .sb__guests-rooms{margin-bottom: 30px;}
    .bootstrap-select button.selectpicker--empty{color: #000000;}    
    button.sb__guests-add-room:hover{background: transparent !important;}
    .sb__footer-actions a:last-child,.bootstrap-select .caret{display: none;}
</style>
<div class="motor row">
  <div class="container">
     <div class="motor-content">
         <?php if(get_data_simple_booking('sb_show_title') == 1){ ?>
         <div class="row">
             <div class="col-sm-12">
                 <div id="main-booking-container"></div>
             </div>
         </div>
        <?php } else { ?>
        <div class="row">
            <div class="col-sm-2">
                <div class="motor-title">
                    <h2 class="title">Reserva Online</h2>
                </div>
            </div>
             <div class="col-sm-10">
                 <div id="main-booking-container"></div>
             </div>
        </div>
        <?php } ?>
     </div>    
  </div>
</div>
<!-- END BOOKING -->
<?php if(get_data_simple_booking("sb_theme_form") == 1){ $theme_form = 'dark'; } else { $theme_form = 'light-pink'; } ?>
<script type="text/javascript">
    (function (i, s, o, g, r, a, m) {
        i['SBSyncroBoxParam'] = r; i[r] = i[r] || function () {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date(); a = s.createElement(o),
            m = s.getElementsByTagName(o)[0]; a.async = 1; a.src = g; m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'https://cdn.simplebooking.it/search-box-script.axd?IDA=<?php echo get_data_simple_booking("sb_id_hotel"); ?>','SBSyncroBox');
    var theme_form = '<?php echo $theme_form; ?>';
    var color_main = '<?php echo get_data_simple_booking("sb_color_1"); ?>';
    var hover_main = '<?php echo get_data_simple_booking("sb_color_2"); ?>';
    SBSyncroBox({
        CodLang: 'ES',
        MainContainerId: 'main-booking-container',
        Labels: {
            CheckAvailability: {
                'ES' : 'BUSCAR',
                'CA' : 'CERCA',
                'EN' : 'SEARCH',
                'FR' : 'Chercher'
            },
            PromoCode: {
                'ES' : 'Entrar un c&oacute;digo descuento',
                'CA' : 'Entrar un codi descompte',
                'EN' : 'Enter a discount code',
                'FR' : 'Entrer un code de remise'
            }
        },
        Styles: {
            Theme: theme_form,
            CustomBGColor: '#ffffff',
            CustomColor: color_main,
            CustomIconColor: color_main,
            CustomLinkColor: color_main,
            CustomAccentColor: color_main,
            CustomButtonBGColor: color_main,
            CustomBoxShadowColorFocus: color_main,
            CustomColorHover: hover_main,
            CustomLabelHoverColor: hover_main,
            CustomButtonHoverBGColor: hover_main,
            CustomWidgetElementHoverColor: hover_main,
            CustomWidgetElementHoverBGColor: hover_main
        }
    });
</script>