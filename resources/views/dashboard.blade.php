<x-layouts.app :title="__('Dashboard')">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 bg-body-tertiary border p-2">
        <h1 class="h2 text-body">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
            <button type="button"
                class="btn btn-sm btn-outline-secondary dropdown-toggle d-flex align-items-center gap-1">
                <svg class="bi" aria-hidden="true">
                    <use xlink:href="#calendar3"></use>
                </svg>
                This week
            </button>
        </div>
    </div>
    <style>
        .dashboard-card {
            transition: transform 0.2s ease, background-color 0.3s ease;
            cursor: pointer;
            border-radius: 0.75rem;
            padding: 0.75rem 1rem;
            font-size: 0.875rem;
        }

        .dashboard-card:hover {
            transform: translateY(-5px);
        }

        .dashboard-card .card-body {
            padding: 0.75rem 0.5rem;
        }

        .dashboard-card .card-title {
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 0.25rem;
        }

        .dashboard-card .card-text {
            font-size: 1.1rem;
            font-weight: bold;
            margin: 0;
        }

        .dashboard-card .small mb-0 {
            font-size: 0.75rem;
        }

        .card-users {
            background-color: #e0f0ff;
        }

        .card-projects {
            background-color: #e6ffed;
        }

        .card-messages {
            background-color: #fff4e0;
        }

        .card-roles {
            background-color: #f0e0ff;
        }

        [data-bs-theme="dark"] .card-users {
            background-color: #1d2d40;
        }

        [data-bs-theme="dark"] .card-projects {
            background-color: #1e3a2f;
        }

        [data-bs-theme="dark"] .card-messages {
            background-color: #3a2f1d;
        }

        [data-bs-theme="dark"] .card-roles {
            background-color: #2e1d40;
        }
    </style>


    <div class="row row-cols-1 row-cols-md-4 g-4">

        <div class="col">
            <a href="#" class="text-decoration-none">
                <div class="card dashboard-card text-white bg-primary">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-2 mx-3">
                            <h5 class="card-title mb-0">Users</h5>
                            <i class="bi bi-people fs-3"></i>
                        </div>
                        <p class="card-text fs-4 fw-bold">1,254</p>
                        <p class="small mb-0">Total registered users</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col">
            <a href="#" class="text-decoration-none">
                <div class="card dashboard-card text-white bg-info">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-2">
                            <h5 class="card-title mb-0">Roles</h5>
                            <i class="bi bi-person-badge fs-3"></i>
                        </div>
                        <p class="card-text fs-4 fw-bold">5</p>
                        <p class="small mb-0">Defined user roles</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col">
            <a href="#" class="text-decoration-none">
                <div class="card dashboard-card text-white bg-danger">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-2">
                            <h5 class="card-title mb-0">Services</h5>
                            <i class="bi bi-gear fs-3"></i>
                        </div>
                        <p class="card-text fs-4 fw-bold">12</p>
                        <p class="small mb-0">Active service offerings</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col">
            <a href="#" class="text-decoration-none">
                <div class="card dashboard-card text-white bg-success">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-2">
                            <h5 class="card-title mb-0">Projects</h5>
                            <i class="bi bi-kanban fs-3"></i>
                        </div>
                        <p class="card-text fs-4 fw-bold">342</p>
                        <p class="small mb-0">Ongoing projects</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col">
            <a href="#" class="text-decoration-none">
                <div class="card dashboard-card text-white bg-secondary">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-2">
                            <h5 class="card-title mb-0">Blog Posts</h5>
                            <i class="bi bi-journal-text fs-3"></i>
                        </div>
                        <p class="card-text fs-4 fw-bold">38</p>
                        <p class="small mb-0">Published articles</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col">
            <a href="#" class="text-decoration-none">
                <div class="card dashboard-card text-dark bg-warning">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-2">
                            <h5 class="card-title mb-0">Messages</h5>
                            <i class="bi bi-chat-dots fs-3"></i>
                        </div>
                        <p class="card-text fs-4 fw-bold">128</p>
                        <p class="small mb-0">New contact messages</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col">
            <a href="#" class="text-decoration-none">
                <div class="card dashboard-card text-white bg-dark">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-2">
                            <h5 class="card-title mb-0">Unread</h5>
                            <i class="bi bi-envelope-open fs-3"></i>
                        </div>
                        <p class="card-text fs-4 fw-bold">7</p>
                        <p class="small mb-0">Unread inquiries</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col">
            <a href="#" class="text-decoration-none">
                <div class="card dashboard-card text-white" style="background-color: #6f42c1;">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-2">
                            <h5 class="card-title mb-0">Testimonials</h5>
                            <i class="bi bi-chat-left-quote fs-3"></i>
                        </div>
                        <p class="card-text fs-4 fw-bold">22</p>
                        <p class="small mb-0">Client reviews published</p>
                    </div>
                </div>
            </a>
        </div>

    </div>



    <div class="mt-5 card shadow-sm border-0 bg-body-tertiary text-body">
        <div class="card-body">
            <h5 class="card-title">Recent Activity</h5>
            <div style="height: 250px;"
                class="bg-secondary rounded d-flex align-items-center justify-content-center text-light">
                Chart or table placeholder
            </div>
        </div>
    </div>

</x-layouts.app>
