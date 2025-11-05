import { type PropsWithChildren } from 'react';

interface AuthLayoutProps {
    name?: string;
    title?: string;
    description?: string;
}

export default function AuthSimpleLayout({ children, title, description }: PropsWithChildren<AuthLayoutProps>) {
    return (
        <div className="d-flex align-items-center justify-content-center min-vh-100 bg-light">
            <div className="card p-4 shadow-sm" style={{ maxWidth: '400px', width: '100%' }}>
                <h4 className="fw-bold mb-3 text-center text-primary">{title}</h4>
                {description && <p className="mb-4 text-center text-muted">{description}</p>}
                {children}
            </div>
        </div>
    );
}
