export default function Contact() {
  return (
    <section id="contact" className="py-20 bg-gray-50 dark:bg-gray-900">
      <div className="container mx-auto px-6">
        <h2 className="text-4xl font-bold text-center mb-12 text-gray-900 dark:text-white">
          Contact
        </h2>
        <div className="max-w-2xl mx-auto">
          <div className="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-8">
            <div className="space-y-6">
              <div>
                <h3 className="text-lg font-semibold mb-2 text-gray-900 dark:text-white">
                  이메일
                </h3>
                <a
                  href="mailto:your.email@example.com"
                  className="text-blue-600 dark:text-blue-400 hover:underline"
                >
                  your.email@example.com
                </a>
              </div>
              <div>
                <h3 className="text-lg font-semibold mb-2 text-gray-900 dark:text-white">
                  GitHub
                </h3>
                <a
                  href="https://github.com/yourusername"
                  target="_blank"
                  rel="noopener noreferrer"
                  className="text-blue-600 dark:text-blue-400 hover:underline"
                >
                  github.com/yourusername
                </a>
              </div>
              <div>
                <h3 className="text-lg font-semibold mb-2 text-gray-900 dark:text-white">
                  LinkedIn
                </h3>
                <a
                  href="https://linkedin.com/in/yourusername"
                  target="_blank"
                  rel="noopener noreferrer"
                  className="text-blue-600 dark:text-blue-400 hover:underline"
                >
                  linkedin.com/in/yourusername
                </a>
              </div>
            </div>
          </div>
          <p className="text-center mt-8 text-gray-600 dark:text-gray-400">
            프로젝트 협업이나 궁금한 점이 있으시면 언제든 연락주세요!
          </p>
        </div>
      </div>
    </section>
  );
}
