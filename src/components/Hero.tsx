export default function Hero() {
  return (
    <section id="hero" className="min-h-screen flex items-center justify-center bg-gradient-to-b from-blue-50 to-white dark:from-gray-900 dark:to-gray-800">
      <div className="container mx-auto px-6 text-center">
        <p className="text-lg md:text-xl text-blue-600 dark:text-blue-400 mb-4 font-semibold">
          Frontend Developer
        </p>
        <h1 className="text-5xl md:text-7xl font-bold mb-6 text-gray-900 dark:text-white">
          한상헌
        </h1>
        <p className="text-xl md:text-2xl text-gray-600 dark:text-gray-300 mb-4">
          9년 경력의 프론트엔드 개발자입니다
        </p>
        <p className="text-lg md:text-xl text-gray-500 dark:text-gray-400 mb-8">
          React · Next.js · TypeScript
        </p>
        <div className="flex gap-4 justify-center">
          <a
            href="#projects"
            className="px-8 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors"
          >
            프로젝트 보기
          </a>
          <a
            href="#contact"
            className="px-8 py-3 border-2 border-blue-600 text-blue-600 dark:text-blue-400 rounded-lg hover:bg-blue-50 dark:hover:bg-gray-700 transition-colors"
          >
            연락하기
          </a>
        </div>
      </div>
    </section>
  );
}
