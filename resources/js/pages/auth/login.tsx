import AuthenticatedSessionController from '@/actions/App/Http/Controllers/Auth/AuthenticatedSessionController';
import InputError from '@/components/input-error';
import TextLink from '@/components/text-link';
import { Button } from '@/components/ui/button';
import { Checkbox } from '@/components/ui/checkbox';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import AuthLayout from '@/layouts/auth-layout';
import { register } from '@/routes';
import { request } from '@/routes/password';
import { Form, Head } from '@inertiajs/react';
import { LoaderCircle } from 'lucide-react';

interface LoginProps {
    status?: string;
    canResetPassword: boolean;
}

export default function Login({ status, canResetPassword }: LoginProps) {
    return (
        <AuthLayout title="Belépés" description="Add meg az email címed és jelszavad a bejelentkezéshez">
            <Head title="Log in" />

            <Form {...AuthenticatedSessionController.store.form()} resetOnSuccess={['password']} className="d-flex flex-column gap-4">
                {({ processing, errors }) => (
                    <>
                        <div className="d-grid gap-4">
                            <div className="mb-3">
                                <Label htmlFor="email" className="form-label">
                                    Email
                                </Label>
                                <Input
                                    id="email"
                                    type="email"
                                    name="email"
                                    required
                                    autoFocus
                                    tabIndex={1}
                                    autoComplete="email"
                                    placeholder="email@example.com"
                                    className="form-control"
                                />
                                <InputError message={errors.email} />
                            </div>

                            <div className="mb-3">
                                <div className="d-flex justify-content-between align-items-center">
                                    <Label htmlFor="password" className="form-label">
                                        Jelszó
                                    </Label>
                                    {canResetPassword && (
                                        <TextLink href={request()} className="text-decoration-none small" tabIndex={5}>
                                            Elfelejtetted jelszavad?
                                        </TextLink>
                                    )}
                                </div>
                                <Input
                                    id="password"
                                    type="password"
                                    name="password"
                                    required
                                    tabIndex={2}
                                    autoComplete="current-password"
                                    placeholder="Jelszó"
                                    className="form-control"
                                />
                                <InputError message={errors.password} />
                            </div>

                            <div className="form-check mb-3">
                                <Checkbox id="remember" name="remember" tabIndex={3} className="form-check-input" />
                                <Label htmlFor="remember" className="form-check-label">
                                    Emlékezz rám
                                </Label>
                            </div>

                            <Button type="submit" tabIndex={4} disabled={processing} className="btn btn-primary w-100">
                                {processing && <LoaderCircle className="spinner-border spinner-border-sm me-2" />}
                                Belépés
                            </Button>
                        </div>

                        <div className="small mt-3 text-center text-muted">
                            Nincs még fiókod?{' '}
                            <TextLink href={register()} tabIndex={5} className="text-decoration-none">
                                Regisztráció
                            </TextLink>
                        </div>
                    </>
                )}
            </Form>

            {status && <div className="mb-4 text-center text-sm font-medium text-green-600">{status}</div>}
        </AuthLayout>
    );
}
