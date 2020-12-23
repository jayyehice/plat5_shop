<!DOCTYPE html>
<html lang="zh-Hant-TW">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>閒置過長</title>

        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .content {
                text-align: center;
            }

            button {
                cursor: pointer;
            }

            .loginBtn {
                background-color: transparent;
                font-weight: 700;
                color: #3d4852;
                padding: .75rem 1.5rem .75rem 1.5rem;
                border-radius: .5rem;
                border-color:  #dae1e7;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div>
                    <div style="font-size:28px; margin-bottom:20px;">此頁閒置時間過長，請重新登入</div>
                    <a href="{{ url()->current() }}">
                        <button class="loginBtn">
                            返回前一頁
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </body>
</html>
