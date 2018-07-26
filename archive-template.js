(function ($) {

    $(document).ready(function () {
        audioLibraryButtonClickHandler();
        lazyloadVideosOnTabClick();
        handleCategoriesButtonClick();
        categoriesMobileMenu();
        categoriesMobileMenuTwo();
        handleShowMoreClick();
        attachVideoClickHandler();
        handleSearchKeyup();
        preventEnterSubmit();
        fixedSidebar();
    });

    function audioLibraryButtonClickHandler() {
        // toggle grid and list views
        $(document).on('click', '#audio-library-content #controls button', function (e) {
            e.preventDefault();
            var section = $(this).data('section');
            $('#audio-library-content .section').show();
            $('#audio-library-content .section:not(#'+section+')').hide();
        });
    }

    function lazyloadVideosOnTabClick() {
        $('li[data-tab="exclusive-library"]').on('click.lazyLoadVideo', function (e) {
            $('.exclusive-videos').find('iframe').map(function () {
                if ($(this).data('video-lazy-src').length) {
                    $(this).attr('src', $(this).data('video-lazy-src'));
                }
            });
            $('li[data-tab="exclusive-library"]').off('click.lazyLoadVideo');
        });
    }

    function switchBackToAudioLibraryTab () {
        $('li[data-tab="audio-library"]').addClass('current');
        $('li[data-tab="exclusive-library"]').removeClass('current');
        $('#audio-library').addClass('current');
        $('#exclusive-library').removeClass('current');
        if (history.pushState) {
            history.pushState(null, null, '#audio-library');
        } else {
            window.location.hash='#audio-library';
        }
    }

    function handleCategoriesButtonClick() {
        $(document).on('click', '#categories button', function (e) {
            $('#filterResults').hide();
            $('#membershipPlans').hide();
            $('#mostrecent').hide();
            $('#audio-library-content').show();
            switchBackToAudioLibraryTab();
            var group = e.target.dataset.group;   
            if (group === 'show-all') {
                $('#mostrecent').show();
                $('#audio-library-content .download-category').show();
                $('#audio-library-content .download-category.show-category').removeClass('show-category');
            } else {
                $('#audio-library-content .download-category').show();
                $('#'+group).addClass('show-category');
                $('#audio-library-content .download-category:not(#'+group+')').hide();
            }      
        });
    }

    function categoriesMobileMenu() {
            
            $('.toggle').click(function() {
            $('#categories').toggle('');
});
    };
        
    function categoriesMobileMenuTwo() {
        
            if ($(window).width() < 980) {
            $('#categories li button').click(function() {
            $('#categories').toggle('');
            });
            };

            
    };
        
    function handleShowMoreClick() {
        // collapsable show more show less
        $('.showmore-btn').on('click', function () {
            var _this = this;
            var exclude = $(this).closest('.collapsable').find('.exclude');
            var text = $(this).text();

            exclude.get(0).style.display = (exclude.get(0).style.display === 'none') ? 'block' : 'none';
            $(this).text(text === 'Show More' ? 'Show Less' : 'Show More');

            if (text === 'Show Less') {
                $('html, body').animate({
                    scrollTop: $(_this).offset().top - 600
                }, 250);
            }
        });
    }

    function handleLazyLoadImgs(context) {
        // user jetpack lazyload if exist
        if (typeof jetpackLazyImagesModule === 'function') {
            jetpackLazyImagesModule(jQuery);
            return;
        }
        // else do our best with a fallback
        $(context).find('img').map(function () {
            if ($(this).hasClass('jetpack-lazy-image--handled') 
                && typeof $(this).data('lazySrc') == 'string' 
                && $(this).data('lazySrc').length) {
                $(this).attr('src', $(this).data('lazySrc'));
            }
        })
    }

    // filter function
    function filterSearchResults (e, items) {
        [].slice.call(items).map(function (item) {
            var text = item.getElementsByClassName('edd_download_title')[0].getElementsByTagName('a')[0].textContent;
            if (text.toLowerCase().indexOf(e.target.value.toLowerCase()) > -1) {
                var node = item.cloneNode(true)
                filterResults.appendChild(node)
            }
        })
    }

    function attachVideoClickHandler(context) {
        context = context || document;
        // Scroll exclusive videos from search results to their location in the exclusive tab
        $('a[href*="exclusive-video"], a[href*="women-video"]', context).on('click', function (e) {
            e.preventDefault();

            var dataId = $(this).data('post-id');
            var target = $('h3[data-post-id="'+dataId+'"]');        
            $('li[data-tab="exclusive-library"]').click();  

            $('html, body').animate({
                scrollTop: $(target).offset().top - 50
            }, 250);
        });
    }

    function handleSearchKeyup() {
        // list of edd_downloads
        var edd_downloads = document.getElementById('grid').getElementsByClassName('edd_download');

        var audioLibraryContent = document.getElementById('audio-library-content');
        var filterResults = document.getElementById('filterResults');
        var membershipPlans = document.getElementById('membershipPlans');

        // keyup event
        document.getElementsByName('custom_search')[0].addEventListener('keyup', function (e) {
            switchBackToAudioLibraryTab();
            filterResults.innerHTML = '';
            filterResults.style.display = 'block';
            membershipPlans.style.display = 'block';
            if (e.target.value.length) {
                audioLibraryContent.style.display = 'none';
                filterSearchResults(e, edd_downloads);
                handleLazyLoadImgs(filterResults);
                attachVideoClickHandler(filterResults);
            } else {
                audioLibraryContent.style.display = 'block';
                //membershipPlans.style.display = 'none';
            }
        });
    }
    
    // Prevent Enter submit
    function preventEnterSubmit() {
    $('.download-search-form').keydown(function(event){
        if(event.keyCode == 13) {
            event.preventDefault();
            return false;
        }
    });
};
    
function fixedSidebar() {
    var div_top = $('.sidebarUnlimitedDownloads').offset().top;

$(window).scroll(function() {
    var window_top = $(window).scrollTop() - 0;
    if (window_top > div_top) {
        if (!$('.sidebarUnlimitedDownloads').is('.sticky')) {
            $('.sidebarUnlimitedDownloads').addClass('sticky');
        }
    } else {
        $('.sidebarUnlimitedDownloads').removeClass('sticky');
    }
});
};
    
})(jQuery)