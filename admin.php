<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 20px;
            font-family: Arial, sans-serif;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            height: 100%;
            background-color: #343a40;
            color: white;
            padding-top: 30px;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            display: block;
        }

        .sidebar a:hover {
            background-color: #495057;
        }

        .main-content {
            margin-left: 250px;
            padding: 20px;
        }

        .top-header {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .form-container {
            margin-top: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color: #f8f9fa;
        }

        .form-container h3 {
            margin-bottom: 20px;
        }

        .img-preview {
            max-width: 100%;
            max-height: 200px;
            margin-top: 10px;
        }

        .editor-toolbar button {
            margin-right: 5px;
        }

        .editor-toolbar button.active {
            background-color: #007bff;
            color: white;
        }

        .dropdown-menu {
            width: 250px;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h3 class="text-center text-white">Admin Panel</h3>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="#">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Users</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Reports</a>
            </li>
            <!-- Settings Dropdown -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="settingsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Settings
                </a>
                <ul class="dropdown-menu" aria-labelledby="settingsDropdown">
                    <li><a class="dropdown-item" href="#" id="openForm">Create Content</a></li>
                    <li><a class="dropdown-item" href="#" id="openForm2">Edit Content</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Logout</a>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Header -->
        <div class="top-header">
            <div class="user-info">
                <span>Welcome, Admin</span>
            </div>
            <div class="logout">
                <a href="#" class="btn btn-danger">Logout</a>
            </div>
        </div>

        <!-- Content Area -->
        <div class="container">
            <!-- Form Container for Create/Edit Content -->
            <div class="form-container" id="formContainer" style="display: none;">
                <h3>Create or Edit Content</h3>
                <form id="contentForm">
                    <!-- Title Input -->
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" required>
                    </div>

                    <!-- Description Input -->
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" rows="3" required></textarea>
                    </div>

                    <!-- Paragraph Input -->
                    <div class="mb-3">
                        <label for="paragraph" class="form-label">Paragraph</label>
                        <div class="editor-toolbar">
                            <button type="button" class="btn btn-outline-secondary" id="boldBtn"><b>B</b></button>
                            <button type="button" class="btn btn-outline-secondary" id="italicBtn"><i>I</i></button>
                            <button type="button" class="btn btn-outline-secondary" id="h1Btn">H1</button>
                            <button type="button" class="btn btn-outline-secondary" id="h2Btn">H2</button>
                        </div>
                        <textarea class="form-control" id="paragraph" rows="4" required></textarea>
                    </div>

                    <!-- Image Upload -->
                    <div class="mb-3">
                        <label for="image" class="form-label">Upload Image</label>
                        <input type="file" class="form-control" id="image" accept="image/*">
                        <img id="imgPreview" class="img-preview" style="display:none;">
                    </div>

                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

    <script>
        // Toggle the form visibility
        document.getElementById("openForm").addEventListener("click", function() {
            const formContainer = document.getElementById("formContainer");
            formContainer.style.display = formContainer.style.display === "none" ? "block" : "none";
        });

        document.getElementById("openForm2").addEventListener("click", function() {
            const formContainer = document.getElementById("formContainer");
            formContainer.style.display = formContainer.style.display === "none" ? "block" : "none";
        });

        // Text formatting buttons functionality
        const boldBtn = document.getElementById("boldBtn");
        const italicBtn = document.getElementById("italicBtn");
        const h1Btn = document.getElementById("h1Btn");
        const h2Btn = document.getElementById("h2Btn");

        const paragraph = document.getElementById("paragraph");

        // Bold
        boldBtn.addEventListener("click", function() {
            document.execCommand('bold');
            toggleActive(boldBtn);
        });

        // Italic
        italicBtn.addEventListener("click", function() {
            document.execCommand('italic');
            toggleActive(italicBtn);
        });

        // H1
        h1Btn.addEventListener("click", function() {
            document.execCommand('formatBlock', false, 'h1');
            toggleActive(h1Btn);
        });

        // H2
        h2Btn.addEventListener("click", function() {
            document.execCommand('formatBlock', false, 'h2');
            toggleActive(h2Btn);
        });

        // Helper function to toggle active class
        function toggleActive(button) {
            const buttons = document.querySelectorAll(".editor-toolbar button");
            buttons.forEach(btn => btn.classList.remove("active"));
            button.classList.add("active");
        }

        // Image preview
        document.getElementById("image").addEventListener("change", function(event) {
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = function(e) {
                const imgPreview = document.getElementById("imgPreview");
                imgPreview.src = e.target.result;
                imgPreview.style.display = "block";
            };

            reader.readAsDataURL(file);
        });

        // Form submission
        document.getElementById("contentForm").addEventListener("submit", function(event) {
            event.preventDefault();
            alert("Form submitted successfully!");
            // You can send the form data to a server or process it here
        });
    </script>
</body>
</html>
