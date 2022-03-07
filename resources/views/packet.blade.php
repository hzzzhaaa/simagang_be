@extends('layouts.app')
@section('content')

<div class="container">

<div class="container-fluid px-4">
                        <h1 class="mt-4">Paket Program</h1>
                        <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <a href="/tambahpaket" class="btn btn-primary btn-user btn-block">Tambah Paket</a>
                            </div>
                        </div>
                        </div>

                        <div class="card-body">
                            <div class="d-flex justify-content-center">
                                <div class="spinner-border"
                                     role="status" id="loading">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col" id="semester">

                                </div>
                            </div>
                        </div>
                        </div>


                    </div>
</div>

<script>
    $(document).ready(function () {
        console.log('ready');

        // api url
        const api_url =
            "http://localhost:8001/api/semesters";

        // Defining async function
        async function getapi(url) {

            // Storing response
            const response = await fetch(url);

            // Storing data in form of JSON
            var data = await response.json();
            console.log(data);
            if (response) {
                hideloader();
            }
            show(data);
        }
        // Calling that async function
        getapi(api_url);

        // Function to hide the loader
        function hideloader() {
            document.getElementById('loading').style.display = 'none';
        }
        // Function to define innerHTML for HTML table
        function show(data) {
            // Loop to access all rows
            for (let r of data.data) {
                col += `
                <div class="card" id="kotak" >
                                        <div class="card-body">
                                        <p>Semester 115</p>
                                        <div class="highlightijo"> Aktif</div>
                                        <i class="fas fa-calendar-alt"></i>
                                        2020-2021
                                        <br>
                                        </div>
                                    </div>`;
            }

            // Setting innerHTML as tab variable
            document.getElementById("semester").innerHTML = col;
        }
    });

</script>

@endsection
