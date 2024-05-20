<?php 
session_start();

if(!isset($_SESSION['username'])) {
	header('Location: login.php');
} 
?>

<?php  
$menu = [
	['name' => 'ChickenBall', 'price' => 30, 'quantity' => 10],
	['name' => 'Kikiam', 'price' => 40, 'quantity' => 10],
	['name' => 'Kwek-Kwek', 'price' => 50, 'quantity' => 10],];
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
		<style type="text/css">
		body {
			background-color: floralwhite;
		}
		h5 {
			font-weight: normal;
		}
		.center {
			background-color: indianred;
			border: 5px;
			padding: 10px; /* Padding around the text */
	        margin: 25px auto; /* Top margin and horizontally centered */
	        width: 60%; /* Width of the div */
	        box-sizing: border-box; /* Include padding and border in the width */
	        border-radius: 32px; /* Rounded corners */
	        text-align: center;
	        color: floralwhite;

	        display: flex;
	        justify-content: space-around;
		}
		.list {
			color: indianred;
			font-family: cursive;
			background-color: floralwhite;
			border-radius: 16px;
	        margin: 25px auto;
	        width: 100%;
	        padding: 10px;
	        text-align: justify;
	        box-sizing: border-box;
	        border: 5px solid #chocolate;
	        font-family: Arial, sans-serif;
		}
		a {
	        color: floralwhite; /* Normal link color */
	        text-decoration: none; /* Remove underline */
	    }
	    a:visited {
	        color: floralwhite; /* Visited link color */
	    }
	    a:hover {
	        color: floralwhite; /* Hover link color */
	        text-decoration: underline; /* Underline on hover */
	    }
	    a:active {
	        color: grey; /* Active link color */
	    }
	</style>
</head>
<body>

<div class="center">
	<div class="center-middle">
		<h1>Welcome, <?php echo $_SESSION['username'];?>!</h1>
		<h5>Click to <a href="logout.php">Logout</a>.</h5>
        <p>Here is the menu for today.</p>
		<div class="list">
			<ul>
				<?php foreach ($menu as $item) : ?>
					<li><?= htmlspecialchars($item['name']); ?> - <?= htmlspecialchars($item['price']); ?> PHP</li>
				<?php endforeach; ?>
    		</ul>	
		</div>

		<form method="POST" action="">
			<p>
				<label for="order">Choose your order: </label>
		            <select name="order" id="order">
		                <option value="">Select an option</option>
		                <?php foreach ($menu as $item) : ?>
		                	<option value="<?= htmlspecialchars($item['name']); ?>"><?= htmlspecialchars($item['name']); ?></option>
		                <?php endforeach; ?>
        			</select>
    		</p>
    		<p>
    			Quantity:
    			<input type="text" name="quantity">
    		</p>
    		<p>
	            Cash:
	            <input type="text" name="cash">
	        </p>
	        <p>
	            <input type="submit" value="Submit" name="Submit">
	        </p>
	    </form>
		<?php
		    if ($_SERVER["REQUEST_METHOD"] == "POST") {
		        $order = isset($_POST['order']) && $_POST['order'] != "" ? $_POST['order'] : null;
		        $quantity = isset($_POST['quantity']) && trim($_POST['quantity']) !== "" ? floatval($_POST['quantity']) : 0;
		        $cash = isset($_POST['cash']) && trim($_POST['cash']) !== "" ? floatval($_POST['cash']) : 0;

		        if (!$order) {
		            echo "<p>Please choose from the available choices! </p>";
		        } else {
		            if ($quantity <= 0) {
		                echo "<p>Please enter a valid quantity.</p>";
		            } elseif ($cash <= 0) {
		                echo "<p>Please enter the amount of cash you're paying with.</p>";
		            } else {
		                foreach ($menu as $item) {
		                    if ($item['name'] === $order) {
		                        $totalCost = $item['price'] * $quantity;
		                        if ($cash < $totalCost) {
		                            echo "<p>I'm sorry, but you have insufficient payment.<br>You need exactly <b>" . ($totalCost - $cash) . " PHP</b> more.</br></p>";
		                        } elseif ($cash == $totalCost) {
		                            echo "<p>Thank you! Your payment is exact. Enjoy your $order!</p>";
		                        } else {
		                            echo "<p>Here is your change: <b>" . ($cash - $totalCost) . " PHP</b>.<br>Enjoy your $order and order again!</br></p>";
		                        }
		                        break;
		                    }
		                }
		            }
		        }
		    }
		    ?>
	</div>
</div>

</body>
</html>
