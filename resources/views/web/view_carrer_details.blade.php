@extends($activeTemplate . 'layouts.frontend')
@section('content')
    <style>
        ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            margin-bottom: 1rem;
        }

        ul li {
            margin: 0;
            padding: 0;
            width: 150px;
            text-align: center;
        }

        ul li.bg {
            background-color: #ccc;
            border-radius: 2rem;
            transform: translatex(-300%);
            z-index: -1;
            transition: all .5s ease-in-out;
        }

        ul li label {
            display: inline-block;
            padding: 10px 20px;
            border-radius: 100px;
        }

        #button-1:checked~ul li.bg {
            transform: translatex(-300%);
        }

        #button-2:checked~ul li.bg {
            transform: translatex(-200%);
        }

        #button-3:checked~ul li.bg {
            transform: translatex(-100%);
        }

        #button-1:checked~#content #tab-1 {
            display: flex;
        }

        #button-2:checked~#content #tab-2 {
            display: flex;
        }

        #button-3:checked~#content #tab-3 {
            display: flex;
        }

        #button-1:checked~#shadow #content {
            transform: translatex(0px);
        }

        #button-2:checked~#shadow #content {
            transform: translatex(-33.33%);
        }

        #button-3:checked~#shadow #content {
            transform: translatex(-66.67%);
        }

        /* #tabs {
                    max-width: 900px;
                  } */

        #shadow {
            box-shadow: 0px 4px 8px rgba(0, 0, 0, .15);
            border-radius: 12px;
            overflow: hidden;
        }

        #content {
            display: flex;
            width: 300%;
            box-sizing: border-box;
            transition: all .5s ease-in-out;
        }

        #content>div {
            padding: 20px;
            padding-left: 40px;
            display: flex;
            align-items: center;
            flex: 1;
            background: #6e2c2c4a;
        }

        #content .left {
            flex: 2;
        }

        #content .right {
            flex: 1;
        }

        #content img {
            width: 100%;
        }

        #content h4 {
            margin: 0;
            font-size: 1.5rem;
            letter-spacing: -1px;
        }

        #content p {
            font-size: 1rem;
            line-height: 1.5rem;
            margin: 1.2rem 0;
            color: #000;
        }

        #content button {
            background-color: #000;
            color: #fff;
            display: inline-block;
            border: 0;
            padding: 12px 20px;
            font-size: 1.2rem;
            border-radius: 2rem;
            transition: all .25s ease-in-out;
            cursor: pointer;
        }

        #content button:hover {
            transform: scale(1.08);
            box-shadow: 0px 4px 8px rgba(0, 0, 0, .15);
        }

        input[type="radio"] {
            display: none;
        }

        .mt-5 {
            margin-top: 5rem;
        }

        @media screen and (max-width: 768px) {
            ul li label {
                padding: 8px 12px;
                font-size: 0.9rem;
            }

            ul li {
                width: 120px;
            }

            #content>div {
                padding: 15px;
                padding-left: 20px;
                flex-direction: column;
                text-align: center;
            }

            #content .left {
                flex: 1;
                margin-bottom: 1rem;
            }

            #content .right {
                flex: 1;
            }

            #content img {
                width: 80%;
                /* Smaller image for mobile */
                margin: 0 auto;
            }

            #content h4 {
                font-size: 1.2rem;
            }

            #content p {
                font-size: 0.9rem;
                line-height: 1.3rem;
            }

            #content button {
                padding: 10px 15px;
                font-size: 1rem;
            }
        }

        @media screen and (max-width: 480px) {
            ul li label {
                padding: 6px 8px;
                font-size: 0.8rem;
            }

            ul li {
                width: 100px;
            }

            #content img {
                width: 90%;
                /* Further reduced size for smaller screens */
            }

            #content h4 {
                font-size: 1rem;
            }

            #content p {
                font-size: 0.8rem;
            }

            #content button {
                padding: 8px 12px;
                font-size: 0.9rem;
            }

            .career {
                padding: 20px;
            }
        }

        @media (min-width: 991px) {
            .career {
                padding: 41px;
            }
        }
    </style>
    <div class="career">
        <div id="tabs" class="mt-5">
            <input type="radio" id="button-1" name="tab" checked>
            <input type="radio" id="button-2" name="tab">
            <input type="radio" id="button-3" name="tab">

            <ul>
                <li>
                    <label for="button-1">About</label>
                </li>
                <li>
                    <label for="button-2">Road Map</label>
                </li>
                <li>
                    <label for="button-3">Colleges</label>
                </li>
                <li class="bg"></li>
            </ul>

            <div id="shadow">
                <div id="content">
                    <div id="tab-1">
                        <div class="left">
                            <h4>iPhone 12 Pro</h4>
                            <p>
                                5G goes Pro. A14 Bionic rockets past every other smartphone chip. The Pro camera system
                                takes low-light photography to the next level — with an even bigger jump on iPhone 12 Pro
                                Max. And Ceramic Shield delivers four times better drop performance. Let’s see what this
                                thing can do.
                            </p>
                            <button>Shop Now</button>
                        </div>
                        <div class="right">
                            <img
                                src="https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/iphone-12-pro-family-hero?wid=940&amp;hei=1112&amp;fmt=jpeg&amp;qlt=80&amp;.v=1604021663000">
                        </div>
                    </div>
                    <div id="tab-2">
                        <div class="left">
                            <h4>iPhone 12</h4>
                            <p>
                                5G speed. A14 Bionic, the fastest chip in a smartphone. An edge-to-edge OLED display.
                                Ceramic Shield with four times better drop performance. And Night mode on every camera.
                                iPhone 12 has it all — in two perfect sizes.
                            </p>
                            <button>Shop Now</button>
                        </div>
                        <div class="right">
                            <img
                                src="https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/iphone-12-family-select-2020?wid=940&amp;hei=1112&amp;fmt=jpeg&amp;qlt=80&amp;.v=1604343709000">
                        </div>
                    </div>
                    <div id="tab-3">
                        <div class="left">
                            <h4>iPhone SE</h4>
                            <p>
                                iPhone SE packs our powerful A13 Bionic chip into our most popular size at our most
                                affordable price. It’s just what you’ve been waiting for.
                            </p>
                            <button>Shop Now</button>
                        </div>
                        <div class="right">
                            <img
                                src="https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/iphone-se-family-select-2020?wid=882&amp;hei=1058&amp;fmt=jpeg&amp;qlt=80&amp;.v=1586794486444">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
