<?php
defined('BASEPATH') or exit('No direct script access allowed');
/** @var MY_Controller $controller */
/** @var array $data */
/** @var string $view */
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php $controller->view('page/head', $data); ?>
</head>

<body>
    <?php $controller->view('page/main-nav', $data); ?>
    <main>
        <?php $controller->view('page/banner', $data); ?>
        <?php $controller->view('page/menu', $data); ?>
        <div class="container">
            <?php $controller->view($view, $data); ?>

        </div>
    </main>
    <?php $controller->view('page/footer', $data); ?>
    <script type="text/javascript">
        (function($) {
            $.fn.carousel = function(options) {

                this.addClass('carousel');
                this.css('position', 'relative');
                var nextBtn = $('<i class="fa-solid fa-chevron-right"></i>');
                var prevBtn = $('<i class="fa-solid fa-chevron-left"></i>');
                this.append(nextBtn);
                this.append(prevBtn);

                var itemIndex = 0;
                var allChildren = this.find(options.childSelector);
                var size = options.size;
                var pages = Math.ceil(allChildren.length / size);

                allChildren.css('display', 'none');
                var prevItem = null;

                currentItem = $(allChildren.filter(function(index) {
                    return index >= size * itemIndex && index < size * (itemIndex + 1);
                }));
                if (currentItem) {
                    currentItem.show();
                }
                nextBtn.click(function() {
                    prevItem = $(allChildren.filter(function(index) {
                        return index >= size * itemIndex && index < size * (itemIndex + 1);
                    }));
                    itemIndex++;
                    if (itemIndex >= pages) {
                        itemIndex = 0;
                    }
                    currentItem = $(allChildren.filter(function(index) {
                        return index >= size * itemIndex && index < size * (itemIndex + 1);
                    }));
                    if (prevItem) {
                        prevItem.hide();
                    }
                    if (currentItem) {
                        currentItem.fadeIn();
                    }
                });
                prevBtn.click(function() {
                    prevItem = $(allChildren.filter(function(index) {
                        return index >= size * itemIndex && index < size * (itemIndex + 1);
                    }));
                    itemIndex--;
                    if (itemIndex < 0) {
                        itemIndex = pages - 1;
                    }
                    currentItem = $(allChildren.filter(function(index) {
                        return index >= size * itemIndex && index < size * (itemIndex + 1);
                    }));
                    if (prevItem) {
                        prevItem.hide();
                    }
                    if (currentItem) {
                        currentItem.fadeIn();
                    }
                });
                $(window).resize(function() {
                    if (window.innerWidth >= 768) {
                        size = (options.desktop && options.desktop.size) || options.size;
                        pages = Math.ceil(allChildren.length / size);
                        allChildren.hide();
                        if (itemIndex > pages) {
                            itemIndex = 0;
                        }
                        currentItem = $(allChildren.filter(function(index) {
                            return index >= size * itemIndex && index < size * (itemIndex + 1);
                        }));
                        if (currentItem) {
                            currentItem.fadeIn();
                        }
                    } else {
                        size = (options.mobile && options.mobile.size) || options.size;
                        pages = Math.ceil(allChildren.length / size);
                        allChildren.hide();
                        if (itemIndex > pages) {
                            itemIndex = 0;
                        }
                        currentItem = $(allChildren.filter(function(index) {
                            return index >= size * itemIndex && index < size * (itemIndex + 1);
                        }));
                        if (currentItem) {
                            currentItem.fadeIn();
                        }
                    }
                });
                if (window.innerWidth >= 768) {
                    size = (options.desktop && options.desktop.size) || options.size;
                    pages = Math.ceil(allChildren.length / size);
                    allChildren.hide();
                    if (itemIndex > pages) {
                        itemIndex = 0;
                    }
                    currentItem = $(allChildren.filter(function(index) {
                        return index >= size * itemIndex && index < size * (itemIndex + 1);
                    }));
                    if (currentItem) {
                        currentItem.fadeIn();
                    }
                } else {
                    size = (options.mobile && options.mobile.size) || options.size;
                    pages = Math.ceil(allChildren.length / size);
                    allChildren.hide();
                    if (itemIndex > pages) {
                        itemIndex = 0;
                    }
                    currentItem = $(allChildren.filter(function(index) {
                        return index >= size * itemIndex && index < size * (itemIndex + 1);
                    }));
                    if (currentItem) {
                        currentItem.fadeIn();
                    }
                }
            };

            $('#slide-morongvontu').carousel({
                size: 2,
                childSelector: '.col',
                mobile: {
                    size: 2
                },
                desktop: {
                    size: 5
                }
            });

            $('#slide-tapdochieu').carousel({
                size: 4,
                childSelector: '.col',
                mobile: {
                    size: 4
                },
                desktop: {
                    size: 10
                }
            });

            $('#slide-luyentuvacau').carousel({
                size: 1,
                childSelector: '.col-md-3',
                mobile: {
                    size: 1
                },
                desktop: {
                    size: 4
                }
            });

            $('#slide-taplamvan').carousel({
                size: 1,
                childSelector: '.col-md-3',
                mobile: {
                    size: 1
                },
                desktop: {
                    size: 4
                }
            });

            $('#slide-dethitonghop').carousel({
                size: 4,
                childSelector: '.col',
                mobile: {
                    size: 4
                },
                desktop: {
                    size: 10
                }
            });
            
        })(jQuery);
    </script>
</body>

</html>