<?php
if(empty($otype)){$otype = 'OFF';}
$get_loop_offers_simple_booking = simplexml_load_file("http://www.simplebooking.it/feed/rss.aspx?GUID=".get_data_simple_booking('sb_id_chain')."&TIPO=".$otype."&LANG=ES") or die("Ha ocurrido un error con las Ofertas. Contacte con soporte.");

    if(is_front_page() && $get_loop_offers_simple_booking.lenght > 2) {

        foreach ($get_loop_offers_simple_booking as $items) {
            foreach ($items->item as $item) { ?>

                <div data-id="<?php echo $item->guid; ?>" class="elementor-element elementor-element-<?php echo $item->guid; ?> elementor-column elementor-col-33 elementor-top-column" data-element_type="column">
                    <div class="elementor-column-wrap elementor-element-populated">
                        <div class="elementor-widget-wrap">
                            <div data-id="onedejg" class="elementor-element elementor-element-onedejg elementor-widget elementor-widget-image" data-element_type="image.default">
                                <div class="elementor-widget-container">
                                    <div class="elementor-image">
                                        <img src="<?php echo $item->enclosure['url']; ?>" class="attachment-progression-studios-room size-progression-studios-room" alt="" width="800" height="500">
                                    </div>
                                </div>
                            </div>
                            <div data-id="pinmzss" class="elementor-element elementor-element-pinmzss elementor-widget elementor-widget-heading" data-element_type="heading.default">
                                <div class="elementor-widget-container">
                                    <h3 class="elementor-heading-title elementor-size-default"><?php echo $item->title; ?></h3>
                                </div>
                            </div>
                            <div data-id="akgawgm" class="elementor-element elementor-element-akgawgm elementor-widget elementor-widget-text-editor" data-element_type="text-editor.default">
                                <div class="elementor-widget-container">
                                    <div class="elementor-text-editor elementor-clearfix"><p><?php echo substr(strip_tags($item->description), 0, strpos(strip_tags($item->description), ' ', 150)) . '...'; ?></p></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- open popup -->
                <div id="boosted-elements-popup-<?php echo $item->guid; ?>"
                     class="boosted-elements-close-modal-in-editor default" style="display:none;width:70%;">
                    <div class="boosted-elements-progression-popup-container" style="width:100%;">
                        <div class="boosted-elements-popup-header">
                            <h2 class="boosted-elements-popup-title"><?php echo $item->title; ?></h2>
                        </div><!-- close .boosted-popup-header -->
                        <div class="boosted-elements-popup-content">
                            <?php echo $item->description; ?>
                            <div class="clearfix-boosted-element"></div>
                        </div>
                        <div class="boosted-elements-popup-<?php echo $item->guid; ?>_close boosted-elements-close-btn">
                            <i class="fa fa-times" aria-hidden="true"></i></div>
                        <div class="clearfix-boosted-element"></div>
                    </div>
                </div>
                <script type="text/javascript">
                    jQuery(document).ready(function ($) {
                        'use strict';
                        setTimeout(function () {
                            $('#boosted-elements-popup-<?php echo $item->guid; ?>').popup({
                                autoopen: false,
                                opacity: 1,
                                scrolllock: false,
                                color: '',
                                transition: 'all 500ms',
                                vertical: 'center'
                            });
                        }, 0);
                    });
                </script>
                <!-- close popup -->
            <?php }
        }

    } else {
        foreach ($get_loop_offers_simple_booking as $items) {
            foreach ($items->item as $item) { ?>
                <section data-id="<?php echo $item->guid; ?>"
                         class="elementor-element elementor-element-<?php echo $item->guid; ?> elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section"
                         data-element_type="section">
                    <div class="elementor-container elementor-column-gap-default">
                        <div class="elementor-row">
                            <div data-id="<?php echo $item->guid; ?>"
                                 class="elementor-element elementor-element-<?php echo $item->guid; ?> elementor-column elementor-col-33 elementor-top-column"
                                 data-element_type="column">
                                <div class="elementor-column-wrap elementor-element-populated">
                                    <div class="elementor-widget-wrap">
                                        <div data-id="3c3a89f"
                                             class="elementor-element elementor-element-<?php echo $item->guid; ?> elementor-widget elementor-widget-image"
                                             data-element_type="image.default">
                                            <div class="elementor-widget-container">
                                                <div class="elementor-image">
                                                    <img src="<?php echo $item->enclosure['url']; ?>" title="" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div data-id="<?php echo $item->guid; ?>"
                                 class="elementor-element elementor-element-<?php echo $item->guid; ?> elementor-column elementor-col-66 elementor-top-column"
                                 data-element_type="column">
                                <div class="elementor-column-wrap elementor-element-populated">
                                    <div class="elementor-widget-wrap">
                                        <div data-id="95e3ca4"
                                             class="elementor-element elementor-element-95e3ca4 elementor-widget elementor-widget-text-editor"
                                             data-element_type="text-editor.default">
                                            <div class="elementor-widget-container">
                                                <div class="elementor-text-editor elementor-clearfix">
                                                    <h3><?php echo $item->title; ?></h3>
                                                    <?php echo substr(strip_tags($item->description), 0, strpos(strip_tags($item->description), ' ', 400)) . '...'; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div data-id="<?php echo $item->guid; ?>"
                                             class="elementor-element elementor-element-<?php echo $item->guid; ?> elementor-align-right elementor-widget elementor-widget-button"
                                             data-element_type="button.default">
                                            <div class="elementor-widget-container">
                                                <div class="elementor-button-wrapper">
                                                    <!--div class="boosted-elements-popup-<?php echo $item->guid; ?>_open elementor-button-link elementor-button elementor-size-sm" data-popup-ordinal="0" id="open_<?php echo $item->guid; ?>">
                                                        Leer más
                                                    </div-->
                                                    <a href="<?php echo $item->link; ?>" target="_blank"
                                                       class="elementor-button-link elementor-button elementor-size-sm"
                                                       role="button">
                                                        <span class="elementor-button-content-wrapper">
                                                            <span class="elementor-button-text">Reservar</span>
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- open popup -->
                <div id="boosted-elements-popup-<?php echo $item->guid; ?>"
                     class="boosted-elements-close-modal-in-editor default" style="display:none;width:70%;">
                    <div class="boosted-elements-progression-popup-container" style="width:100%;">
                        <div class="boosted-elements-popup-header">
                            <h2 class="boosted-elements-popup-title"><?php echo $item->title; ?></h2>
                        </div><!-- close .boosted-popup-header -->
                        <div class="boosted-elements-popup-content">
                            <?php echo $item->description; ?>
                            <div class="clearfix-boosted-element"></div>
                        </div>
                        <div class="boosted-elements-popup-<?php echo $item->guid; ?>_close boosted-elements-close-btn">
                            <i class="fa fa-times" aria-hidden="true"></i></div>
                        <div class="clearfix-boosted-element"></div>
                    </div>
                </div>
                <script type="text/javascript">
                    jQuery(document).ready(function ($) {
                        'use strict';
                        setTimeout(function () {
                            $('#boosted-elements-popup-<?php echo $item->guid; ?>').popup({
                                autoopen: false,
                                opacity: 1,
                                scrolllock: false,
                                color: '',
                                transition: 'all 500ms',
                                vertical: 'center'
                            });
                        }, 0);
                    });
                </script>
                <!-- close popup -->
            <?php }
        }
    }
?>