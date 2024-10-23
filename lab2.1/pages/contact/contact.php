<section>
    <h1>Contact Us</h1>
    <p>
        If you have any questions, comments, or concerns, please feel free to contact us using the form below. We value your feedback and will do our best to respond to your inquiries in a timely manner. Thank you for visiting ActorWiki!
    </p>
    <form method="post">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        // Display submitted information
        echo "<h2>Thank you for your message, $name!</h2>";
        echo "<p>Email: $email</p>";
        echo "<p>Message: $message</p>";
    }
    ?>
</section>