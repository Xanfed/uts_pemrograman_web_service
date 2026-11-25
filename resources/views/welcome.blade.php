<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UTS Pem Web</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts: Inter / Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Segoe+UI:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', -apple-system, BlinkMacSystemFont, Roboto, Helvetica, Arial, sans-serif;
            background-color: #fbfbfd;
            color: #212529;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Top Navbar */
        .custom-navbar {
            padding-top: 1.25rem;
            padding-bottom: 1rem;
            background-color: transparent;
        }

        .navbar-brand {
            font-size: 1.15rem;
            font-weight: 600;
            color: #1f2937 !important;
            margin-right: 2rem;
        }

        .custom-nav-link {
            font-size: 0.95rem;
            text-decoration: none;
            padding: 0 0.75rem;
            color: #6c757d;
            transition: color 0.15s ease-in-out;
        }

        .custom-nav-link.active {
            color: #212529;
            font-weight: 500;
        }

        .custom-nav-link:hover {
            color: #111827;
        }

        /* Notification Banner */
        .custom-alert {
            background-color: #d1e7dd;
            border: 1px solid #badbcc;
            color: #0f5132;
            border-radius: 8px;
            padding: 0.85rem 1.25rem;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1.75rem;
        }

        .custom-alert .btn-close-custom {
            background: none;
            border: none;
            font-size: 1.4rem;
            line-height: 1;
            color: #0f5132;
            opacity: 0.7;
            cursor: pointer;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .custom-alert .btn-close-custom:hover {
            opacity: 1;
        }

        /* Cards Grid */
        .custom-card {
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.04);
            height: 100%;
            display: flex;
            flex-direction: column;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .custom-card:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
        }

        /* Add Card (First Card) */
        .add-card-body {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 420px;
            height: 100%;
            cursor: pointer;
            background-color: #ffffff;
        }

        .add-circle-btn {
            width: 72px;
            height: 72px;
            border-radius: 50%;
            background-color: #5cb85c;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            box-shadow: 0 4px 10px rgba(92, 184, 92, 0.3);
            transition: transform 0.2s ease, background-color 0.2s ease;
            text-decoration: none;
            border: none;
        }

        .add-circle-btn:hover {
            transform: scale(1.06);
            background-color: #4cae4c;
            color: #ffffff;
        }

        .add-circle-btn svg {
            width: 34px;
            height: 34px;
            stroke-width: 2.8;
        }

        /* Profile Cards */
        .card-img-wrapper {
            width: 100%;
            height: 250px;
            background-color: #f1f3f5;
            overflow: hidden;
        }

        .card-img-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center top;
        }

        .profile-card-body {
            padding: 1.25rem 1.25rem 1rem 1.25rem;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }

        .profile-name {
            font-size: 1.15rem;
            font-weight: 700;
            color: #111827;
            margin-bottom: 0.45rem;
            text-transform: lowercase;
        }

        .profile-desc {
            font-size: 0.865rem;
            line-height: 1.5;
            color: #555e68;
            margin-bottom: 1.5rem;
            flex-grow: 1;
        }

        /* Action Buttons */
        .card-actions {
            display: flex;
            gap: 0.5rem;
            margin-top: auto;
        }

        .btn-custom-edit {
            color: #0d6efd;
            border: 1px solid #b6d4fe;
            background-color: #ffffff;
            font-size: 0.815rem;
            padding: 0.25rem 0.75rem;
            border-radius: 5px;
            text-decoration: none;
            transition: all 0.15s ease-in-out;
        }

        .btn-custom-edit:hover {
            background-color: #0d6efd;
            color: #ffffff;
            border-color: #0d6efd;
        }

        .btn-custom-delete {
            color: #dc3545;
            border: 1px solid #f8d7da;
            background-color: #ffffff;
            font-size: 0.815rem;
            padding: 0.25rem 0.75rem;
            border-radius: 5px;
            text-decoration: none;
            transition: all 0.15s ease-in-out;
        }

        .btn-custom-delete:hover {
            background-color: #dc3545;
            color: #ffffff;
            border-color: #dc3545;
        }

        /* Footer */
        footer {
            margin-top: auto;
            padding-top: 3.5rem;
            padding-bottom: 2.5rem;
        }

        .footer-nav {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 1.75rem;
            margin-bottom: 1.75rem;
        }

        .footer-nav a {
            color: #6c757d;
            text-decoration: none;
            font-size: 0.95rem;
            transition: color 0.15s ease;
        }

        .footer-nav a:hover {
            color: #212529;
        }

        .footer-divider {
            border-top: 1px solid #e5e7eb;
            max-width: 960px;
            margin: 0 auto 1.5rem auto;
        }

        .footer-copyright {
            font-size: 0.875rem;
            color: #6c757d;
            text-align: center;
        }
    </style>
</head>

<body>

    <!-- Header / Navbar -->
    <header class="custom-navbar">
        <div class="container" style="max-width: 980px;">
            <div class="d-flex align-items-center flex-wrap">
                <a class="navbar-brand mb-0" href="#">UTS Pem Web</a>
                <nav class="d-flex align-items-center flex-wrap gap-2">
                    <a class="custom-nav-link active" href="#">Home</a>
                    <a class="custom-nav-link" href="#">Features</a>
                    <a class="custom-nav-link" href="#">(Anak Agung Ngurah Sugiri Astha Putra Panji)</a>
                    <a class="custom-nav-link" href="#">(24010110179)</a>
                </nav>
            </div>
        </div>
    </header>

    <!-- Main Content Area -->
    <main class="flex-grow-1">
        <div class="container" style="max-width: 980px;">
            <!-- Alert Banner -->
            <div class="custom-alert" id="statusAlert" role="alert">
                <span>Biodata berhasil diperbarui.</span>
                <button type="button" class="btn-close-custom" onclick="dismissAlert()"
                    aria-label="Close">&times;</button>
            </div>

            <!-- Cards Grid: 3 Columns -->
            <div class="row g-4 mb-4">
                <!-- Card 1: Add Card -->
                <div class="col-12 col-md-4">
                    <div class="custom-card">
                        <div class="add-card-body" onclick="openAddModal()" title="Tambah Biodata Baru">
                            <button class="add-circle-btn" type="button" aria-label="Tambah">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Card 2: Rizki Eka Prasodjo -->
                <div class="col-12 col-md-4">
                    <div class="custom-card">
                        <div class="card-img-wrapper">
                            <img src="{{ asset('images/rizki.jpg') }}" alt="rizki eka prasodjo"
                                onerror="this.src='https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=500&auto=format&fit=crop&q=80'">
                        </div>
                        <div class="profile-card-body">
                            <h2 class="profile-name">rizki eka prasodjo</h2>
                            <p class="profile-desc">
                                12.11.5866 merupakan master dari uts ini dengan tugas membuat front-end dan
                                mengirimkannya ke grup
                            </p>
                            <div class="card-actions">
                                <button type="button" class="btn-custom-edit"
                                    onclick="openEditModal('rizki eka prasodjo', '12.11.5866', 'master dari uts ini dengan tugas membuat front-end dan mengirimkannya ke grup')">Edit</button>
                                <button type="button" class="btn-custom-delete"
                                    onclick="confirmDelete('rizki eka prasodjo')">Hapus</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 3: Andi Agus Salim -->
                <div class="col-12 col-md-4">
                    <div class="custom-card">
                        <div class="card-img-wrapper">
                            <img src="{{ asset('images/andi.jpg') }}" alt="andi agus salim"
                                onerror="this.src='https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=500&auto=format&fit=crop&q=80'">
                        </div>
                        <div class="profile-card-body">
                            <h2 class="profile-name">andi agus salim</h2>
                            <p class="profile-desc">
                                dengan NIM 12.11.6018 merupakan pegawai dan mempunyai tugas mengerjakan back-end pada
                                UTS ini
                            </p>
                            <div class="card-actions">
                                <button type="button" class="btn-custom-edit"
                                    onclick="openEditModal('andi agus salim', '12.11.6018', 'pegawai dan mempunyai tugas mengerjakan back-end pada UTS ini')">Edit</button>
                                <button type="button" class="btn-custom-delete"
                                    onclick="confirmDelete('andi agus salim')">Hapus</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <div class="container" style="max-width: 980px;">
            <div class="footer-nav">
                <a href="#">Home</a>
                <a href="#">Features</a>
                <a href="#">Pricing</a>
                <a href="#">FAQs</a>
                <a href="#">About</a>
            </div>
            <div class="footer-divider"></div>
            <p class="footer-copyright mb-0">
                &copy; 2025 Dibuat Sejujurnya Oleh Team (Anak Agung Ngurah Sugiri Astha Putra Panji) dan (Bagus Dwi
                Syahputra) Tanpa Mencotek
                dari Tim Lain
            </p>
        </div>
    </footer>

    <!-- Front-End Only Modals (Bootstrap 5) for interactivity preview without backend -->
    <!-- Modal Edit/Tambah Form -->
    <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-3 border-0 shadow">
                <div class="modal-header border-bottom-0 pb-0">
                    <h5 class="modal-title fw-bold" id="formModalLabel">Edit Biodata</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="previewForm" onsubmit="handleFormSubmit(event)">
                        <div class="mb-3">
                            <label class="form-label small fw-semibold text-secondary">Nama Lengkap</label>
                            <input type="text" class="form-control" id="inputNama" placeholder="Masukkan nama..."
                                required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-semibold text-secondary">NIM</label>
                            <input type="text" class="form-control" id="inputNim" placeholder="Masukkan NIM..."
                                required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-semibold text-secondary">Deskripsi / Tugas</label>
                            <textarea class="form-control" id="inputDeskripsi" rows="3" placeholder="Masukkan rincian tugas..." required></textarea>
                        </div>
                        <div class="d-flex justify-content-end gap-2 mt-4">
                            <button type="button" class="btn btn-light btn-sm px-3"
                                data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary btn-sm px-3">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Client-side Front-End Script (No Backend) -->
    <script>
        function dismissAlert() {
            const alert = document.getElementById('statusAlert');
            if (alert) {
                alert.style.transition = 'opacity 0.25s ease, transform 0.25s ease';
                alert.style.opacity = '0';
                alert.style.transform = 'translateY(-6px)';
                setTimeout(() => alert.remove(), 250);
            }
        }

        let formModalInstance = null;
        document.addEventListener('DOMContentLoaded', function() {
            const modalEl = document.getElementById('formModal');
            if (modalEl) {
                formModalInstance = new bootstrap.Modal(modalEl);
            }
        });

        function openAddModal() {
            document.getElementById('formModalLabel').innerText = 'Tambah Biodata';
            document.getElementById('inputNama').value = '';
            document.getElementById('inputNim').value = '';
            document.getElementById('inputDeskripsi').value = '';
            if (formModalInstance) {
                formModalInstance.show();
            }
        }

        function openEditModal(name, nim, desc) {
            document.getElementById('formModalLabel').innerText = 'Edit Biodata - ' + name;
            document.getElementById('inputNama').value = name;
            document.getElementById('inputNim').value = nim;
            document.getElementById('inputDeskripsi').value = desc;
            if (formModalInstance) {
                formModalInstance.show();
            }
        }

        function confirmDelete(name) {
            if (confirm(`Apakah Anda yakin ingin menghapus data "${name}"?`)) {
                showAlert(`Data "${name}" berhasil dihapus.`);
            }
        }

        function handleFormSubmit(event) {
            event.preventDefault();
            const nama = document.getElementById('inputNama').value;
            if (formModalInstance) {
                formModalInstance.hide();
            }
            showAlert(`Biodata "${nama}" berhasil diperbarui.`);
        }

        function showAlert(message) {
            const container = document.querySelector('main .container');
            const existingAlert = document.getElementById('statusAlert');
            if (existingAlert) {
                existingAlert.remove();
            }
            const alertDiv = document.createElement('div');
            alertDiv.className = 'custom-alert';
            alertDiv.id = 'statusAlert';
            alertDiv.setAttribute('role', 'alert');
            alertDiv.innerHTML = `
                <span>${message}</span>
                <button type="button" class="btn-close-custom" onclick="dismissAlert()" aria-label="Close">&times;</button>
            `;
            container.insertBefore(alertDiv, container.firstChild);
        }
    </script>
</body>

</html>
