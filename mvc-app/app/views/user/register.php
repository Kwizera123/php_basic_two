
    <!-- Main Content -->
    <div>
        <h2 class="text-center mb-4">Register</h2>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="<?php echo base_url("/register"); ?>" method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">Username *</label>
                        <input
                            name="username"
                            type="text"
                            class="form-control"
                            id="name"
                            required
                        >
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address *</label>
                        <input
                            name="email"
                            type="email"
                            class="form-control"
                            id="email"
                            required
                        >
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password *</label>
                        <input
                            name="password"
                            type="password"
                            class="form-control"
                            id="password"
                            required
                        >
                    </div>
                    <div class="mb-3">
                        <label for="confirm-password" class="form-label">Confirm Password *</label>
                        <input
                            name="confirm_password"
                            type="password"
                            class="form-control"
                            id="confirm-password"
                            required
                        >
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Register</button>
                </form>
                <p class="mt-3 text-center">
                    Already have an account? <a href="<?php echo base_url("user/login"); ?>">Login here</a>.
                </p>
            </div>
        </div>
    </div>