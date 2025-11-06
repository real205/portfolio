"use client";

export default function Header() {
    return (
        <header className="fixed inset-x-0 top-0 z-30">
            <div className="backdrop-blur-md bg-black/40">
                <div className="container mx-auto px-6 flex items-center justify-between h-16">
                    <a href="#hero" className="text-white font-bold text-xl tracking-tight">
                        한상헌
                    </a>
                    <nav className="hidden md:flex items-center gap-6">
                        <a href="#about" className="text-white/90 hover:text-white">About</a>
                        <a href="#projects" className="text-white/90 hover:text-white">Projects</a>
                        <a href="#skills" className="text-white/90 hover:text-white">Skills</a>
                        <a href="#contact" className="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-md">Contact</a>
                    </nav>
                    <button className="md:hidden text-white">Menu</button>
                </div>
            </div>
        </header>
    );
}
