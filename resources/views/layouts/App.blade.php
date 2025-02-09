<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title id="page-title">Laravel | Ajax</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body>
    <div id="container" class="container">
    <nav class="text-center">
        <button class="btn btn-primary" onclick="loadPage('form')">Form</button>
        <button class="btn btn-secondary" onclick="loadPage('form1')">Form1</button>
    </nav>

    
        @yield('content')
    </div>

    @stack('scripts')

    <script>
        function loadPage(page) {
            fetch("{{ url('/load-page') }}/" + page)
            .then(response => response.json())
            .then(data => {
                document.getElementById('container').innerHTML = data.html;
                document.getElementById('page-title').innerText = data.title;
                attachFormHandler(); // Reattach form submission handler
            })
            .catch(error => console.error("Error:", error));
        }

        function attachFormHandler() {
            let form = document.querySelector("form");
            if (!form) return;

            form.addEventListener("submit", function (event) {
                event.preventDefault();
                let formData = new FormData(this);
                let actionUrl = this.getAttribute("action");

                fetch(actionUrl, {
                    method: "POST",
                    headers: { "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    document.getElementById('container').innerHTML = data.html;
                    document.getElementById('page-title').innerText = data.title;
                    attachFormHandler(); // Reattach for next form
                })
                .catch(error => console.error("Error:", error));
            });
        }

        document.addEventListener("DOMContentLoaded", attachFormHandler);
    </script>
</body>
</html>
