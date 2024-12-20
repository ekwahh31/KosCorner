<?php
include '../includes/auth_admin.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - User Management</title>
    <link rel="stylesheet" href="../style/admin-user.css">
    <link href="https://fonts.cdnfonts.com/css/mantinia" rel="stylesheet">
    <script src="https://unpkg.com/feather-icons"></script>
</head>
<body>
<nav class="header">
    <div class="header-container">
        <div class="header-left">
            <a href="../index.php">KosCorner</a>
        </div>
        <div class="header-right">
            <a>Admin</a>
        </div>
    </div>
</nav>

<div class="main">
    <div class="user-container">
        <div class="judul">
            <h3>DATABASE USER</h3>
        </div>
        <div class="tabel-container">
            <div class="mid">
                <table class="tabel">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>USERNAME</th>
                            <th>EMAIL</th>
                            <th>PASSWORD</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody id="userTableBody">
                        <!-- Data pengguna akan dimuat di sini oleh JavaScript -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", () => {
    const userTableBody = document.getElementById("userTableBody");

    // Fungsi untuk menampilkan daftar pengguna
    function displayUsers(users) {
        userTableBody.innerHTML = "";
        if (users.length === 0) {
            userTableBody.innerHTML = "<tr><td colspan='4'>Tidak ada pengguna ditemukan.</td></tr>";
            return;
        }
        users.forEach(user => {
            const userRow = document.createElement("tr");
            userRow.innerHTML = `
                <td>${user.id}</td>
                <td>${user.nama}</td>
                <td>${user.email}</td>
                <td>${user.password}</td>
                <td>
                    <div class="action-con">
                        <div class="action-item">
                            <a href="edit_user.php?id=${user.id}">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="fill: white;">
                                    <path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-96c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 96c0 17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 64z"/>
                                </svg>
                            </a>
                        </div>
                        <div class="action-item">
                            <a href="../includes/delete_user.php?id=${user.id}">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" style="fill: white;">
                                    <path d="M135.2 17.7L128 32 32 32C14.3 32 0 46.3 0 64S14.3 96 32 96l384 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-96 0-7.2-14.3C307.4 6.8 296.3 0 284.2 0L163.8 0c-12.1 0-23.2 6.8-28.6 17.7zM416 128L32 128 53.2 467c1.6 25.3 22.6 45 47.9 45l245.8 0c25.3 0 46.3-19.7 47.9-45L416 128z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </td>
            `;
            userTableBody.appendChild(userRow);
        });
    }

    // Fungsi untuk mengambil data pengguna
    function fetchUsers() {
        fetch("get_user.php")
            .then(response => response.json())
            .then(data => displayUsers(data))
            .catch(error => {
                console.error("Error fetching users:", error);
                userTableBody.innerHTML = "<tr><td colspan='4'>Gagal memuat data pengguna. Silakan coba lagi.</td></tr>";
            });
    }

    // Panggil data pengguna saat halaman dimuat
    fetchUsers();
});
</script>
</body>
</html>