<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Table for Email</title>
    <style>
        body {
            font-family: "roboto";
        }

        section {
            width: 550px;
            margin: auto;
            padding: 40px 20px;
            position: relative;
            background-color: #fff;
            color: #333333;
            box-shadow: 0 3px 25px #3333330e;
        }

        section::before {
            width: 100%;
            height: 5px;
            background-color: rgb(0, 224, 176);
            top: 0;
            left: 0;
            position: absolute;
            content: "";
        }

        section p {
            margin-bottom: 15px;
            font-size: 16px;
        }

        table {
            border-collapse: collapse;
            margin-bottom: 40px;
        }

        table td {
            border-bottom: 1px solid #00000018;
            padding: 10px 0;
        }

        table tr:last-child td {
            border-bottom: none;
        }

        section .gray {
            font-size: 14px;
            color: rgba(51, 51, 51, 0.63);
        }

        table .gray {
            padding-right: 10px;
        }

        section .highlight {
            color: rgb(0, 224, 176);
        }

        section a {
            color: inherit;
        }

        section .amount {
            font-size: 20px;
            color: rgb(255, 130, 46);
        }

        @media screen and (max-width: 650px) {
            section {
                width: 90%;
                padding: 25px 20px;
            }

            section p {
                font-size: 14px;
            }

            table {
                font-size: 14px;
            }

            section .gray {
                font-size: 13px;
            }
        }
    </style>
</head>
<body>
<section>

    @if($data['status'])
        <p>Dear user!</p>
        <p>
            Your account has been successfully approved. You can log in using credentials that you entered during
            registration.
        </p>
    @elseif($data['type']==='create')
        <p>Dear user!</p>
        <p>
            Your account has been successfully created.
        </p>

    @elseif($data['type']==='update')
        <p>Dear user!</p>
        <p>
            Your account has been successfully updated
        </p>
    @endif

</section>
</body>
</html>
