<!DOCTYPE html>
<html>
    <head>
        <title>Sobre mi</title>
        <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
        <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    </head>

    <body>
         <x-navbar />
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
        
        <section class="about-us py-5 bg-light">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h2 class="font-weight-bold mb-4">About Our Company</h2>
                        <p class="text-muted mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Donec vel mauris quam.</p>
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="text-primary">Our Mission</h5>
                                <ul class="list-unstyled">
                                    <li><i class="bi bi-check-circle me-2 text-primary"></i>Innovative Solutions</li>
                                    <li><i class="bi bi-check-circle me-2 text-primary"></i>Customer Satisfaction</li>
                                    <li><i class="bi bi-check-circle me-2 text-primary"></i>Sustainable Practices</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h5 class="text-primary">Our Vision</h5>
                                <ul class="list-unstyled">
                                    <li><i class="bi bi-bullseye me-2 text-primary"></i>Global Reach</li>
                                    <li><i class="bi bi-bullseye me-2 text-primary"></i>Industry Leadership</li>
                                    <li><i class="bi bi-bullseye me-2 text-primary"></i>Continuous Growth</li>
                                </ul>
                            </div>
                        </div>
                        <a href="#" class="btn btn-primary mt-4">Learn More</a>
                    </div>
                    <div class="col-md-6">
                        <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w0NzEyNjZ8MHwxfHNlYXJjaHw4fHxjb21wYW55fGVufDB8MHx8fDE3MjEyMTE5MDZ8MA&ixlib=rb-4.0.3&q=80&w=1080" alt="About Us" class="img-fluid rounded shadow">
                    </div>
                </div>
                
                <div class="row mt-5">
                    <div class="col-md-3 col-6 mb-4">
                        <div class="text-center">
                            <i class="bi bi-people fs-1 text-primary mb-2"></i>
                            <h2 class="fw-bold">500+</h2>
                            <p class="text-muted">Clients</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-6 mb-4">
                        <div class="text-center">
                            <i class="bi bi-briefcase fs-1 text-primary mb-2"></i>
                            <h2 class="fw-bold">1000+</h2>
                            <p class="text-muted">Projects</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-6 mb-4">
                        <div class="text-center">
                            <i class="bi bi-trophy fs-1 text-primary mb-2"></i>
                            <h2 class="fw-bold">50+</h2>
                            <p class="text-muted">Awards</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-6 mb-4">
                        <div class="text-center">
                            <i class="bi bi-globe fs-1 text-primary mb-2"></i>
                            <h2 class="fw-bold">20+</h2>
                            <p class="text-muted">Countries</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
    <x-footer />
        
    </body>
</html>