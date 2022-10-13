<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300;400;700&display=swap" rel="stylesheet">

<style>
    body {
        font-family: 'Noto Sans JP', sans-serif;
    }

    .sidebar {
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        z-index: 100;
        padding: 3rem 0 0;
        box-shadow: inset -1px 0 0 var(--bs-gray-400);
    }

    @media all and (max-width: 768px) {
        .sidebar {
            top: 5rem;
        }
    }

    .sidebar .nav-link {
        color: var(--bs-dark);
    }

    .sidebar .sidebar-heading {
        font-size: .75rem;
        text-transform: uppercase;
    }

    .navbar .navbar-brand {
        padding-top: .75rem;
        padding-bottom: .75rem;
        font-size: 1rem;
        background-color: var(--bs-dark);
        box-shadow: inset -1px 0 0 var(--bs-dark);
    }

    .navbar .navbar-toggler {
        top: .25rem;
        right: 1rem;
    }

    .navbar .form-control {
        padding: .75rem 1rem;
        border-width: 0;
        border-radius: 0;
    }

    .navbar .form-control-dark {
        color: var(--bs-light);
        background-color: var(--bs-gray-dark);
        border-color: var(--bs-gray-dark);
    }

    .navbar .form-control-dark:focus {
        box-shadow: initial;
    }

    h1, .h1 {
        position: relative;
        margin-bottom: 1.5rem;
        font-size: 1.75rem;
    }

    h1::after, .h1::after {
        content: '';
        position: absolute;
        bottom: -.5rem;
        left: 0;
        height: .125rem;
        width: 2.5rem;
        background-color: var(--bs-gray-dark);
    }

    h2, .h2 {
        font-size: 1.5rem;
    }

    h3, .h3, h4, .h4 {
        font-size: 1.25rem;
    }
</style>
