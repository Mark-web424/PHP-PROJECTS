<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $storeName; ?></title>
    <style>
        body{ 
            font-family: Arial, sans-serif;
            padding: 20px;
            color: #2b1d12;
            background: linear-gradient(135deg, #2a1c12, #8a5a33);
            background-attachment: fixed;
        }

        main{ 
            max-width: 900px;
            margin: auto;
            padding: 24px;
            background: #f4e4b8;
            border-top: 8px solid #e8b93c;
        }

        h1{ 
            color: #5a3a1e;
            margin-bottom: 0;
        }

        table{ 
            width: 100%;
            border-collapse: collapse;
            background: #fffaf0;
            margin: 12px 0;
        }

        th{ 
            background: #8a5a33;
            color: white;
        }

        th, td{ 
            padding: 8px;
            border: 1px solid #d9c48a;
            text-align: left;
        }

        input, select, button{ 
            width: 100%;
            padding: 9px;
            margin: 6px 0 12px;
            box-sizing: border-box;
        }

        button{ 
            background: #8a5a33;
            color: white;
            border: none;
            cursor: pointer;
        }

        .error{ 
            color: #ad2532;
        }

        .success{ 
            color: #216045;
        }

        .banner{ 
            background: #e8b93c;
            padding: 10px;
        }
    </style>
</head>
<body>
<main>
    <h1><?php echo $storeName; ?></h1>
    <p><?php echo $tagline; ?></p>
    <p><a href="index.php#menu">Menu</a> | <a href="index.php#order">Order</a> | <a href="stocks.php">Stock</a></p>
    <hr>

    