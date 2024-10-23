<section>
    <h1>Review</h1>
    <p>
        If you have any feedback or suggestions for ActorWiki, please let us know using the form below. We appreciate your input and will take your comments into consideration as we continue to improve our platform. Thank you for supporting ActorWiki!
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
        echo "<h2>Thank you for your feedback, $name!</h2>";
        echo "<p>Email: $email</p>";
        echo "<p>Message: $message</p>";
    }
    ?>
</section>