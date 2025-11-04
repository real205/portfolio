export default function Projects() {
  const projects = [
    {
      id: 1,
      title: "LG 에너지솔루션 비셀체크 어드민",
      period: "2025.07 ~ 2025.10",
      description: "React 기반 어드민 시스템 구축 및 컴포넌트 구조 설계. PL로서 프로젝트 전체를 리딩하며 효율적인 개발 환경 구축",
      tech: ["React", "Next.js", "TypeScript", "Tailwind CSS"],
      client: "LG에너지솔루션",
    },
    {
      id: 2,
      title: "삼성 갤럭시 크루 모집",
      period: "2025.10 ~ 진행중",
      description: "삼성 갤럭시 크루 모집 사이트 퍼블리싱 및 반응형 웹 구현",
      tech: ["HTML", "CSS", "JavaScript"],
      client: "PTKOREA",
    },
    {
      id: 3,
      title: "삼성 무풍에어컨 프로모션",
      period: "2025.04 ~ 2025.06",
      description: "삼성 무풍에어컨 프로모션 및 SMB 사업자몰 웹사이트 구축 및 운영 (PC, MOBILE)",
      tech: ["HTML", "CSS", "JavaScript"],
      client: "PTKOREA",
    },
    {
      id: 4,
      title: "SK C&C AI 포털 구축",
      period: "2025.01 ~ 2025.02",
      description: "EJS 기반 AI 포털 웹사이트 구축 및 컴포넌트 개발",
      tech: ["EJS", "Node.js", "JavaScript"],
      client: "SK C&C",
    },
    {
      id: 5,
      title: "wagle 플랫폼 사이트",
      period: "2023.08 ~ 2024.07",
      description: "wagle 플랫폼 사이트 구축 및 디벨롭 사이트 운영. UI 설계, 퍼블리싱 및 신규 콘텐츠 업데이트 담당",
      tech: ["HTML", "CSS", "JavaScript"],
      client: "로웸",
    },
    {
      id: 6,
      title: "빅토리 딜리버리 웹사이트",
      period: "2025.01 ~ 2025.05",
      description: "React 기반 빅토리 딜리버리 웹사이트 신규 구축 및 컴포넌트 개발",
      tech: ["React", "JavaScript"],
      client: "로지포커스",
    },
  ];

  return (
    <section id="projects" className="py-20 bg-gray-50 dark:bg-gray-900">
      <div className="container mx-auto px-6">
        <h2 className="text-4xl font-bold text-center mb-12 text-gray-900 dark:text-white">
          Projects
        </h2>
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          {projects.map((project) => (
            <div
              key={project.id}
              className="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow"
            >
              <div className="h-48 bg-gradient-to-br from-blue-400 to-purple-500"></div>
              <div className="p-6">
                <div className="flex items-center justify-between mb-2">
                  <h3 className="text-xl font-semibold text-gray-900 dark:text-white">
                    {project.title}
                  </h3>
                </div>
                <p className="text-sm text-gray-500 dark:text-gray-400 mb-2">
                  {project.period}
                </p>
                <p className="text-sm text-blue-600 dark:text-blue-400 mb-3">
                  {project.client}
                </p>
                <p className="text-gray-600 dark:text-gray-300 mb-4">
                  {project.description}
                </p>
                <div className="flex flex-wrap gap-2">
                  {project.tech.map((tech, index) => (
                    <span
                      key={index}
                      className="px-3 py-1 bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200 text-sm rounded-full"
                    >
                      {tech}
                    </span>
                  ))}
                </div>
              </div>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
}
