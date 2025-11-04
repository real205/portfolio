export default function About() {
  return (
    <section id="about" className="py-20 bg-white dark:bg-gray-800">
      <div className="container mx-auto px-6">
        <h2 className="text-4xl font-bold text-center mb-12 text-gray-900 dark:text-white">
          About Me
        </h2>
        <div className="max-w-3xl mx-auto">
          <p className="text-lg text-gray-600 dark:text-gray-300 mb-6">
            안녕하세요! 웹 개발에 열정을 가진 개발자입니다.
          </p>
          <p className="text-lg text-gray-600 dark:text-gray-300 mb-6">
            최신 기술을 활용하여 사용자 경험이 뛰어난 웹 애플리케이션을 만드는 것을 좋아합니다.
          </p>
          <div className="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
            <div className="p-6 bg-gray-50 dark:bg-gray-700 rounded-lg">
              <h3 className="text-xl font-semibold mb-2 text-gray-900 dark:text-white">
                경력
              </h3>
              <p className="text-gray-600 dark:text-gray-300">
                웹 개발 경력을 여기에 작성하세요
              </p>
            </div>
            <div className="p-6 bg-gray-50 dark:bg-gray-700 rounded-lg">
              <h3 className="text-xl font-semibold mb-2 text-gray-900 dark:text-white">
                학력
              </h3>
              <p className="text-gray-600 dark:text-gray-300">
                학력 정보를 여기에 작성하세요
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
}
