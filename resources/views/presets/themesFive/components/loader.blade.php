<style>
    .loading-screen {
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        cursor: default;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background: var(--text-color-white);
        z-index: 1000;
    }

    .loading-screen .bar {
        position: absolute;
        height: 100%;
        width: 50%;
        background-color: #ab2931;
    }

    .loading-screen .top-bar {
        top: 0;
        left: 0;
        right: auto;
        bottom: auto;
    }

    .loading-screen .down-bar {
        bottom: 0;
        top: auto;
        right: 0;
        left: auto;
    }


    .loading-screen .animation-preloader {
        z-index: 1000;
    }

    .loading-screen .animation-preloader .spinner {
        -webkit-animation: spinner 1s infinite linear;
        animation: spinner 1s infinite linear;
        border-radius: 50%;
        border: 4px solid #1E1E1E;
        border-top-color: #ab2931;
        width: 150px;
        height: 150px;
        margin: 0 auto 3.5em auto;
    }

    .loading-screen .animation-preloader .txt-loading {
        font: bold 5em "Montserrat", sans-serif;
        text-align: center;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    .loading-screen .animation-preloader .txt-loading .letters-loading {
        color: #E2DFDD;
        position: relative;
    }

    .loading-screen .animation-preloader .txt-loading .letters-loading:before {
        -webkit-animation: letters-loading 4s infinite;
        animation: letters-loading 4s infinite;
        color: #010103;
        content: attr(data-text-preloader);
        left: 0;
        opacity: 0;
        font-family: "Montserrat", sans-serif;
        position: absolute;
        top: -3px;
        -webkit-transform: rotateY(-90deg);
        transform: rotateY(-90deg);
    }

    .loading-screen .animation-preloader .txt-loading .letters-loading:nth-child(2):before {
        -webkit-animation-delay: 0.2s;
        animation-delay: 0.2s;
    }

    .loading-screen .animation-preloader .txt-loading .letters-loading:nth-child(3):before {
        -webkit-animation-delay: 0.4s;
        animation-delay: 0.4s;
    }

    .loading-screen .animation-preloader .txt-loading .letters-loading:nth-child(4):before {
        -webkit-animation-delay: 0.6s;
        animation-delay: 0.6s;
    }

    .loading-screen .animation-preloader .txt-loading .letters-loading:nth-child(5):before {
        -webkit-animation-delay: 0.8s;
        animation-delay: 0.8s;
    }

    .loading-screen .animation-preloader .txt-loading .letters-loading:nth-child(6):before {
        -webkit-animation-delay: 1s;
        animation-delay: 1s;
    }

    .loading-screen .animation-preloader .txt-loading .letters-loading:nth-child(7):before {
        -webkit-animation-delay: 1.2s;
        animation-delay: 1.2s;
    }

    .loading-screen .animation-preloader .txt-loading .letters-loading:nth-child(8):before {
        -webkit-animation-delay: 1.4s;
        animation-delay: 1.4s;
    }


    @-webkit-keyframes spinner {
        to {
            -webkit-transform: rotateZ(360deg);
            transform: rotateZ(360deg);
        }
    }

    @keyframes spinner {
        to {
            -webkit-transform: rotateZ(360deg);
            transform: rotateZ(360deg);
        }
    }

    @-webkit-keyframes letters-loading {

        0%,
        75%,
        100% {
            opacity: 0;
            -webkit-transform: rotateY(-90deg);
            transform: rotateY(-90deg);
        }

        25%,
        50% {
            opacity: 1;
            -webkit-transform: rotateY(0deg);
            transform: rotateY(0deg);
        }
    }

    @keyframes letters-loading {

        0%,
        75%,
        100% {
            opacity: 0;
            -webkit-transform: rotateY(-90deg);
            transform: rotateY(-90deg);
        }

        25%,
        50% {
            opacity: 1;
            -webkit-transform: rotateY(0deg);
            transform: rotateY(0deg);
        }
    }

    @media screen and (max-width: 767px) {
        .loading-screen .animation-preloader .spinner {
            height: 8em;
            width: 8em;
        }

        .loading-screen .animation-preloader .txt-loading {
            font: bold 3.5em "Montserrat", sans-serif;
        }
    }

    @media screen and (max-width: 500px) {
        .loading-screen .animation-preloader .spinner {
            height: 7em;
            width: 7em;
        }

        .loading-screen .animation-preloader .txt-loading {
            font: bold 2em "Montserrat", sans-serif;
        }
    }
</style>
<!--==================== Preloader Start ====================-->

<!--==================== Preloader End ====================-->

<!--==================== Overlay Start ====================-->
<div class="body-overlay"></div>

<!--==================== Overlay End ====================-->

<!--==================== Sidebar Overlay End ====================-->
<div class="sidebar-overlay"></div>
<!--==================== Sidebar Overlay End ====================-->

<!-- ==================== Scroll to Top End Here ==================== -->
<a class="scroll-top"><i class="fa-solid fa-angle-up"></i></a>
<!-- ==================== Scroll to Top End Here ==================== -->

<script>
    var percentage = 0;
    var LoadingCounter = setInterval(function() {
        if (percentage <= 100) {
            // $('#loading-screen ').css('opacity', (100 - percentage));
            $("#loading-screen .loading-counter").text(percentage + "%");
            $("#loading-screen .bar").css("width", (100 - percentage) / 2 + "%");
            $("#loading-screen .progress-line").css(
                "transform",
                "scale(" + percentage / 100 + ")"
            );
            percentage++;
        } else {
            $("#loading-screen").fadeOut(500);
            setTimeout(() => {
                $("#loading-screen").remove();
            }, 500);
            clearInterval(LoadingCounter);
        }
    }, 10);
</script>