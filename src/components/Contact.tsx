"use client";
import { useState } from "react";

export default function Contact() {
  const [form, setForm] = useState({ name: "", email: "", message: "" });
  const [loading, setLoading] = useState(false);
  const [status, setStatus] = useState("");

  const handleChange = (e: React.ChangeEvent<HTMLInputElement | HTMLTextAreaElement>) => {
    setForm({ ...form, [e.target.name]: e.target.value });
  };

  const handleSubmit = async (e: React.FormEvent) => {
    e.preventDefault();
    setLoading(true);
    setStatus("");

    try {
      const res = await fetch("/api/send-email", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(form),
      });

      const data = await res.json();
      if (data.success) {
        setStatus("✅ 메일이 성공적으로 발송되었습니다!");
        setForm({ name: "", email: "", message: "" });
      } else {
        setStatus("❌ 메일 전송 중 오류가 발생했습니다.");
      }
    } catch (err) {
      console.error(err);
      setStatus("⚠️ 서버 연결 실패. 다시 시도해주세요.");
    } finally {
      setLoading(false);
    }
  };

  return (
    <section id="contact" className="min-h-screen flex items-center bg-white dark:bg-gray-900">
      <div className="container mx-auto px-6">
        <h2 className="barlow-condensed-medium uppercase text-[140px] text-center mb-12 text-gray-900 dark:text-white">
          Contact
        </h2>

        <div className="max-w-4xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-8 items-start">
          {/* 왼쪽 안내 */}
          <div className="p-8 rounded-xl bg-gradient-to-br from-gray-50 to-white dark:from-gray-800 dark:to-gray-700 shadow-lg">
            <h3 className="text-xl font-semibold mb-3 text-gray-900 dark:text-white">
              WELCOME
            </h3>
            <p className="text-gray-600 dark:text-gray-300 mb-6">
              프로젝트 협업, 컨설팅, 또는 간단한 인사라도 환영합니다.
            </p>

            <div className="space-y-4">
              <div>
                <div className="text-sm text-gray-500">Email</div>
                <a
                  href="mailto:hahnsangheon@gmail.com"
                  className="text-lg text-blue-600 dark:text-blue-400 uppercase"
                >
                  hahnsangheon@gmail.com
                </a>
              </div>
              <div>
                <div className="text-sm text-gray-500">GitHub</div>
                <a
                  href="https://github.com/real205"
                  target="_blank"
                  rel="noopener noreferrer"
                  className="text-lg text-gray-900 dark:text-gray-100 hover:underline uppercase"
                >
                  github.com/real205
                </a>
              </div>
            </div>
          </div>

          {/* 오른쪽 폼 */}
          <div className="p-8 rounded-xl bg-gradient-to-br from-blue-600 to-purple-600 text-white shadow-xl">
            <h3 className="text-xl font-semibold mb-3">Send a message</h3>
            <form className="space-y-4" onSubmit={handleSubmit}>
              <div>
                <label className="block text-sm mb-1">Name</label>
                <input
                  name="name"
                  className="w-full rounded-md p-2 text-black"
                  placeholder="Your name"
                  value={form.name}
                  onChange={handleChange}
                  required
                />
              </div>
              <div>
                <label className="block text-sm mb-1">Email</label>
                <input
                  name="email"
                  className="w-full rounded-md p-2 text-black"
                  placeholder="you@example.com"
                  value={form.email}
                  onChange={handleChange}
                  required
                />
              </div>
              <div>
                <label className="block text-sm mb-1">Message</label>
                <textarea
                  name="message"
                  className="w-full rounded-md p-2 text-black"
                  rows={4}
                  placeholder="간단한 메세지를 남겨주세요."
                  value={form.message}
                  onChange={handleChange}
                  required
                />
              </div>
              <div className="text-right">
                <button
                  type="submit"
                  disabled={loading}
                  className="px-5 py-2 bg-white/20 hover:bg-white/30 rounded-md disabled:opacity-50"
                >
                  {loading ? "Sending..." : "Send"}
                </button>
              </div>
            </form>
            {status && <p className="mt-3 text-sm">{status}</p>}
          </div>
        </div>

        <p className="text-center mt-8 text-gray-600 dark:text-gray-400">
          빠른 응답을 원하시면 이메일로 바로 연락 주세요.
        </p>
      </div>
    </section>
  );
}
