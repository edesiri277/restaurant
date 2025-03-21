<?php
header('Content-Type: text/html; charset=utf-8');
include('fpdf186/fpdf.php'); // Ensure the path is correct

// Helper function to sanitize input
function sanitize_input($data) {
    return htmlspecialchars(trim($data));
}

// Fetch and sanitize data
$name = isset($_GET['name']) ? sanitize_input($_GET['name']) : 'N/A';
$number = isset($_GET['number']) ? sanitize_input($_GET['number']) : 'N/A';
$email = isset($_GET['email']) ? sanitize_input($_GET['email']) : 'N/A';
$method = isset($_GET['method']) ? sanitize_input($_GET['method']) : 'N/A';
$flat = isset($_GET['flat']) ? sanitize_input($_GET['flat']) : 'N/A';
$street = isset($_GET['street']) ? sanitize_input($_GET['street']) : 'N/A';
$city = isset($_GET['city']) ? sanitize_input($_GET['city']) : 'N/A';
$state = isset($_GET['state']) ? sanitize_input($_GET['state']) : 'N/A';
$country = isset($_GET['country']) ? sanitize_input($_GET['country']) : 'N/A';
$pin_code = isset($_GET['pin_code']) ? sanitize_input($_GET['pin_code']) : 'N/A';
$total_products = isset($_GET['total_products']) ? sanitize_input($_GET['total_products']) : 'N/A';
// Sanitize and convert total price
$total_price = isset($_GET['total_price']) ? (float) str_replace(',', '', sanitize_input($_GET['total_price'])) : 0.00;

// Format total price
$total_price_formatted = number_format($total_price, 2, '.', ',');

// Debug output
error_log("Raw Total Price from GET: " . $_GET['total_price']);
error_log("Sanitized and Converted Total Price: " . $total_price);
error_log("Formatted Total Price: " . $total_price_formatted);


// Create instance of FPDF
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);

// Title
$pdf->Cell(0, 10, 'Order Confirmation', 0, 1, 'C');

// Order Details
$pdf->SetFont('Arial', '', 12);
$pdf->Ln(10); // Line break
$pdf->Cell(0, 10, 'Thank you for dining with us!', 0, 1);
$pdf->Cell(0, 10, 'Total: ' . $total_price_formatted . ' NGN', 0, 1);
$pdf->Ln(5);
$pdf->Cell(0, 10, 'Your name: ' . $name, 0, 1);
$pdf->Cell(0, 10, 'Your number: ' . $number, 0, 1);
$pdf->Cell(0, 10, 'Your email: ' . $email, 0, 1);
$pdf->Cell(0, 10, 'Your address: ' . $flat . ', ' . $street . ', ' . $city . ', ' . $state . ', ' . $country . ' - ' . $pin_code, 0, 1);
$pdf->Cell(0, 10, 'Your payment method: ' . $method, 0, 1);
$pdf->MultiCell(0, 10, 'Total Food Ordered: ' . $total_products, 0, 'L');
$pdf->Cell(0, 10, '(*pay when food arrives*)', 0, 1);

// Output PDF
$pdf->Output('D', 'order_confirmation.pdf');
?>
