
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f7f7f7;
            padding: 20px;
        }
        .form-container {
            display: flex;
            flex-direction: column;
            gap: 20px;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        .title {
            font-size: 30px;
            color: #333;
            font-weight: 700;
            letter-spacing: -1px;
            text-align: center;
        }
        .message {
            color: #888;
            font-size: 14px;
            text-align: center;
            margin-bottom: 20px;
        }
        .form label {
            display: flex;
            flex-direction: column;
            gap: 8px;
            margin-bottom: 20px;
        }
        .form label .input, .form label .textarea {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            outline: none;
            border: 2px solid #ddd;
            border-radius: 8px;
            transition: border-color 0.3s ease;
        }
        .form label .input:focus, .form label .textarea:focus {
            border-color: royalblue;
        }
        .button-container {
            display: flex;
            justify-content: space-between;
            gap: 20px;
        }
        .submit, .reset {
            width: 48%;
            padding: 12px;
            font-size: 16px;
            border: none;
            border-radius: 8px;
            background-color: royalblue;
            color: #fff;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .submit:hover, .reset:hover {
            background-color: rgb(56, 90, 194);
        }
        .reset {
            background-color: #ccc;
        }
        .reset:hover {
            background-color: #aaa;
        }
        .table-container {
            margin-top: 40px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        thead {
            background-color: royalblue;
            color: #fff;
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
        }
        th {
            font-size: 16px;
        }
        tbody tr:nth-child(even) {
            background-color: #f7f7f7;
        }
        tbody tr:hover {
            background-color: rgba(56, 90, 194, 0.1);
        }
        @media (max-width: 768px) {
            .form-container {
                padding: 20px;
                gap: 15px;
            }
            .title {
                font-size: 26px;
            }
            .button-container {
                flex-direction: column;
                gap: 15px;
            }
            .submit, .reset {
                width: 100%;
            }
        }
    </style>
</head>
<body style="margin-top: 85px;">
<?php include '../includes/Navbar.php'; ?>
<div class="form-container">
    <?php
    if(isset($_POST['add-category'])) {
        $category_name = $_POST['category_name'];
        $category_description = $_POST['description'];

        if(!empty($category_name) && !empty($category_description)){
            require_once '../utils/dbConnection.php';
            $sql ="INSERT INTO categories(name, description) VALUES(?, ?)";
            $sqlState = $pdo->prepare($sql);
            $sqlState->execute([$category_name,$category_description]);
            ?>
            <p style="color: green; text-align: center;">Category <?php echo $category_name ?> added successfully</p>
            <?php
        }else{
            echo "<p style='color: red; text-align: center;'>Please fill in all fields</p>";
        }
    }
    ?>
    <form class="form" method="POST">
        <p class="title">Add Category</p>
        <p class="message">Create a new category for your items.</p>

        <label>
            <input required type="text" name="category_name" class="input" placeholder="Category Name">
        </label>

        <label>
            <textarea required name="description" class="textarea" placeholder="Description..." rows="4"></textarea>
        </label>

        <div class="button-container">
            <button class="submit" name="add-category">Submit</button>
            <button type="reset" class="reset">Reset</button>
        </div>
    </form>
</div>

<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Category Name</th>
                <th>Description</th>
                <th>Creation Date</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Electronics</td>
                <td>Items related to technology and gadgets</td>
                <td>2024-12-29</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Books</td>
                <td>Fictional and non-fictional reading materials</td>
                <td>2024-12-28</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Furniture</td>
                <td>Home and office furniture items</td>
                <td>2024-12-27</td>
            </tr>
            <tr>
                <td>1</td>
                <td>Electronics</td>
                <td>Items related to technology and gadgets</td>
                <td>2024-12-29</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Books</td>
                <td>Fictional and non-fictional reading materials</td>
                <td>2024-12-28</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Furniture</td>
                <td>Home and office furniture items</td>
                <td>2024-12-27</td>
            </tr>
            <tr>
                <td>1</td>
                <td>Electronics</td>
                <td>Items related to technology and gadgets</td>
                <td>2024-12-29</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Books</td>
                <td>Fictional and non-fictional reading materials</td>
                <td>2024-12-28</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Furniture</td>
                <td>Home and office furniture items</td>
                <td>2024-12-27</td>
            </tr>
            <tr>
                <td>1</td>
                <td>Electronics</td>
                <td>Items related to technology and gadgets</td>
                <td>2024-12-29</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Books</td>
                <td>Fictional and non-fictional reading materials</td>
                <td>2024-12-28</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Furniture</td>
                <td>Home and office furniture items</td>
                <td>2024-12-27</td>
            </tr>
        </tbody>
    </table>
</div>
</body>
</html>
