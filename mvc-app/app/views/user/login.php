
    <!-- Main Content -->

        <h2 class="text-center mb-4">Login</h2>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="<?php echo base_url("/login"); ?>" method="post">
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
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>
                <p class="mt-3 text-center">
                    Don't have an account? <a href="<?php echo base_url("user/register"); ?>">Register here</a>.
                </p>
            </div>
        </div>