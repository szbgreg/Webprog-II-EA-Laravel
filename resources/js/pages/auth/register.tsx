import RegisteredUserController from '@/actions/App/Http/Controllers/Auth/RegisteredUserController';
import { login } from '@/routes';
import { Form, Head } from '@inertiajs/react';

import InputError from '@/components/input-error';
import TextLink from '@/components/text-link';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import AuthLayout from '@/layouts/auth-layout';

export default function Register() {
    return (
        <AuthLayout title="Fiók létrehozása" description="Add meg az adataidat a regisztrációhoz.">
            <Head title="Regisztráció" />
            <Form {...RegisteredUserController.store.form()} resetOnSuccess={['password', 'password_confirmation']} disableWhileProcessing>
                {({ processing, errors }) => (
                    <>
                        <div className="mb-3">
                            <Label htmlFor="name" className="form-label">
                                Név
                            </Label>
                            <Input
                                id="name"
                                type="text"
                                required
                                autoFocus
                                tabIndex={1}
                                autoComplete="name"
                                name="name"
                                placeholder="Teljes név"
                                className="form-control"
                            />
                            <InputError message={errors.name} className="text-danger small mt-1" />
                        </div>

                        <div className="mb-3">
                            <Label htmlFor="email" className="form-label">
                                Email cím
                            </Label>
                            <Input
                                id="email"
                                type="email"
                                required
                                tabIndex={2}
                                autoComplete="email"
                                name="email"
                                placeholder="email@example.com"
                                className="form-control"
                            />
                            <InputError message={errors.email} className="text-danger small mt-1" />
                        </div>

                        <div className="mb-3">
                            <Label htmlFor="password" className="form-label">
                                Jelszó
                            </Label>
                            <Input
                                id="password"
                                type="password"
                                required
                                tabIndex={3}
                                autoComplete="new-password"
                                name="password"
                                placeholder="Jelszó"
                                className="form-control"
                            />
                            <InputError message={errors.password} className="text-danger small mt-1" />
                        </div>

                        <div className="mb-3">
                            <Label htmlFor="password_confirmation" className="form-label">
                                Jelszó megerősítése
                            </Label>
                            <Input
                                id="password_confirmation"
                                type="password"
                                required
                                tabIndex={4}
                                autoComplete="new-password"
                                name="password_confirmation"
                                placeholder="Jelszó újra"
                                className="form-control"
                            />
                            <InputError message={errors.password_confirmation} className="text-danger small mt-1" />
                        </div>

                        <Button type="submit" tabIndex={5} className="btn btn-primary w-100" disabled={processing}>
                            {processing && <span className="spinner-border spinner-border-sm me-2" role="status" />}
                            Fiók létrehozása
                        </Button>

                        <div className="small mt-3 text-center text-muted">
                            Már van fiókod?{' '}
                            <TextLink href={login()} tabIndex={6} className="text-decoration-none">
                                Bejelentkezés
                            </TextLink>
                        </div>
                    </>
                )}
            </Form>
        </AuthLayout>
    );
}
