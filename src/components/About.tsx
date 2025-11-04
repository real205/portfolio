export default function About() {
  return (
    <section id="about" className="py-20 bg-white dark:bg-gray-800">
      <div className="container mx-auto px-6">
        <h2 className="text-4xl font-bold text-center mb-12 text-gray-900 dark:text-white">
          About Me
        </h2>
        <div className="max-w-4xl mx-auto">
          <p className="text-lg text-gray-600 dark:text-gray-300 mb-6">
            안녕하세요! 9년 이상의 경력을 보유한 프론트엔드 개발자 한상헌입니다.
          </p>
          <p className="text-lg text-gray-600 dark:text-gray-300 mb-6">
            삼성, LG, SK와 같은 대기업 프로젝트부터 스타트업까지 다양한 규모의 웹사이트 구축 및 운영 경험을 가지고 있습니다.
            특히 React, Next.js, TypeScript 기반의 모던 웹 애플리케이션 개발과 UI/UX 설계에 강점을 가지고 있습니다.
          </p>
          <div className="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
            <div className="p-6 bg-gray-50 dark:bg-gray-700 rounded-lg">
              <h3 className="text-xl font-semibold mb-2 text-gray-900 dark:text-white">
                소속
              </h3>
              <p className="text-gray-600 dark:text-gray-300">
                비스톤스 (선임)
              </p>
            </div>
            <div className="p-6 bg-gray-50 dark:bg-gray-700 rounded-lg">
              <h3 className="text-xl font-semibold mb-2 text-gray-900 dark:text-white">
                경력
              </h3>
              <p className="text-gray-600 dark:text-gray-300">
                9년 4개월<br/>
                (2016 ~ 현재)
              </p>
            </div>
            <div className="p-6 bg-gray-50 dark:bg-gray-700 rounded-lg">
              <h3 className="text-xl font-semibold mb-2 text-gray-900 dark:text-white">
                학력
              </h3>
              <p className="text-gray-600 dark:text-gray-300">
                한국방송통신대학교<br/>
                컴퓨터과학과
              </p>
            </div>
          </div>
          <div className="mt-8 p-6 bg-blue-50 dark:bg-gray-700 rounded-lg">
            <h3 className="text-xl font-semibold mb-4 text-gray-900 dark:text-white">
              주요 전문 분야
            </h3>
            <ul className="space-y-2 text-gray-600 dark:text-gray-300">
              <li className="flex items-start">
                <span className="text-blue-600 mr-2">▪</span>
                React, Next.js 기반 웹 애플리케이션 개발
              </li>
              <li className="flex items-start">
                <span className="text-blue-600 mr-2">▪</span>
                TypeScript를 활용한 타입 안정성 있는 코드 작성
              </li>
              <li className="flex items-start">
                <span className="text-blue-600 mr-2">▪</span>
                컴포넌트 구조 설계 및 UI/UX 개발
              </li>
              <li className="flex items-start">
                <span className="text-blue-600 mr-2">▪</span>
                반응형 웹 퍼블리싱 및 크로스 브라우징
              </li>
              <li className="flex items-start">
                <span className="text-blue-600 mr-2">▪</span>
                프로젝트 리딩 및 팀 협업
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>
  );
}
