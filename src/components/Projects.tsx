"use client";

import { motion } from "framer-motion";

export default function Projects() {
  const projects = [
    {
      id: 1,
      title: "LG 에너지솔루션 비셀체크 어드민",
      period: "2025.07 ~ 2025.10",
      description: "React 기반 어드민 시스템 구축 및 컴포넌트 구조 설계. PL로서 프로젝트 전체를 리딩하며 효율적인 개발 환경 구축",
      tech: ["React", "Next.js", "TypeScript", "Tailwind CSS"],
      client: "LG에너지솔루션",
      image: "https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=800&q=80",
    },
    {
      id: 2,
      title: "삼성 갤럭시 크루 모집",
      period: "2025.10 ~ 진행중",
      description: "삼성 갤럭시 크루 모집 사이트 퍼블리싱 및 반응형 웹 구현",
      tech: ["HTML", "CSS", "JavaScript"],
      client: "PTKOREA",
      image: "https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?w=800&q=80",
    },
    {
      id: 3,
      title: "삼성 무풍에어컨 프로모션",
      period: "2025.04 ~ 2025.06",
      description: "삼성 무풍에어컨 프로모션 및 SMB 사업자몰 웹사이트 구축 및 운영 (PC, MOBILE)",
      tech: ["HTML", "CSS", "JavaScript"],
      client: "PTKOREA",
      image: "https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=800&q=80",
    },
    {
      id: 4,
      title: "삼성 갤럭시 스튜디오",
      period: "2025.03 ~ 2025.04",
      description: "갤럭시 신제품 및 캠퍼스 프로모션 웹사이트 구축 및 운영 (PC, MOBILE)",
      tech: ["HTML", "CSS", "JavaScript"],
      client: "PTKOREA",
      image: "https://images.unsplash.com/photo-1556656793-08538906a9f8?w=800&q=80",
    },
    {
      id: 5,
      title: "SK C&C AI 포털 구축",
      period: "2025.01 ~ 2025.02",
      description: "EJS 기반 AI 포털 웹사이트 구축 및 컴포넌트 개발",
      tech: ["EJS", "Node.js", "JavaScript"],
      client: "SK C&C",
      image: "https://images.unsplash.com/photo-1677442136019-21780ecad995?w=800&q=80",
    },
    {
      id: 6,
      title: "빅터 인터트레이드",
      period: "2024.11 ~ 2024.12",
      description: "기업 웹사이트 UI 설계 및 퍼블리싱",
      tech: ["HTML", "CSS", "JavaScript"],
      client: "드래프트",
      image: "https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?w=800&q=80",
    },
    {
      id: 7,
      title: "닥터소울 웹사이트",
      period: "2024.09 ~ 2024.10",
      description: "헬스케어 웹사이트 신규 구축, UI 설계 및 퍼블리싱",
      tech: ["HTML", "CSS", "JavaScript"],
      client: "드래프트",
      image: "https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?w=800&q=80",
    },
    {
      id: 8,
      title: "제이제이컴퍼니",
      period: "2024.07 ~ 2024.08",
      description: "기업 웹사이트 기획, 디자인, 퍼블리싱 전체 진행",
      tech: ["HTML", "CSS", "JavaScript"],
      client: "제이제이컴퍼니",
      image: "https://images.unsplash.com/photo-1497366216548-37526070297c?w=800&q=80",
    },
    {
      id: 9,
      title: "wagle 플랫폼 사이트",
      period: "2023.08 ~ 2024.07",
      description: "wagle 플랫폼 사이트 구축 및 디벨롭 사이트 운영. UI 설계, 퍼블리싱 및 신규 콘텐츠 업데이트 담당",
      tech: ["HTML", "CSS", "JavaScript"],
      client: "로웸",
      image: "https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=800&q=80",
    },
    {
      id: 10,
      title: "리로소프트 자사 웹사이트",
      period: "2023.06 ~ 2023.08",
      description: "PHP 기반 웹사이트 운영 및 LMS UI 개선, 콘텐츠 관리",
      tech: ["PHP", "HTML", "CSS", "JavaScript"],
      client: "리로소프트",
      image: "https://images.unsplash.com/photo-1516321318423-f06f85e504b3?w=800&q=80",
    },
    {
      id: 11,
      title: "빅토리 딜리버리",
      period: "2023.01 ~ 2025.05",
      description: "React 기반 배송 플랫폼 웹사이트 신규 구축 및 컴포넌트 개발",
      tech: ["React", "JavaScript"],
      client: "로지포커스",
      image: "https://images.unsplash.com/photo-1566492031773-4f4e44671857?w=800&q=80",
    },
    {
      id: 12,
      title: "빙고 프레쉬",
      period: "2023.07 ~ 2024.12",
      description: "식품 커머스 웹사이트 구축 및 운영 (PC, MOBILE)",
      tech: ["HTML", "CSS", "JavaScript"],
      client: "로지포커스",
      image: "https://images.unsplash.com/photo-1542838132-92c53300491e?w=800&q=80",
    },
    {
      id: 13,
      title: "컨비니 재팬 몰",
      period: "2023.01 ~ 2023.06",
      description: "고도몰 활용 일본 식품 전문 쇼핑몰 구축 및 반응형 구현",
      tech: ["고도몰", "HTML", "CSS", "JavaScript"],
      client: "로지포커스",
      image: "https://images.unsplash.com/photo-1555939594-58d7cb561ad1?w=800&q=80",
    },
    {
      id: 14,
      title: "엑스루트",
      period: "2022.07 ~ 2022.12",
      description: "물류 기업 웹사이트 리뉴얼 및 반응형 구현",
      tech: ["HTML", "CSS", "JavaScript"],
      client: "로지포커스",
      image: "https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?w=800&q=80",
    },
    {
      id: 15,
      title: "굿투럭",
      period: "2022.02 ~ 2022.06",
      description: "물류 플랫폼 웹사이트 신규 구축 및 운영 (PC, MOBILE)",
      tech: ["HTML", "CSS", "JavaScript"],
      client: "로지포커스",
      image: "https://images.unsplash.com/photo-1494412574643-ff11b0a5c1c3?w=800&q=80",
    },
    {
      id: 16,
      title: "쌩배",
      period: "2021.09 ~ 2022.01",
      description: "배송 서비스 웹사이트 신규 구축 및 운영 (PC, MOBILE)",
      tech: ["HTML", "CSS", "JavaScript"],
      client: "로지포커스",
      image: "https://images.unsplash.com/photo-1578575437130-527eed3abbec?w=800&q=80",
    },
    {
      id: 17,
      title: "로지포커스 웹사이트",
      period: "2021.05 ~ 2021.09",
      description: "물류 기업 웹사이트 리뉴얼 및 반응형 구현",
      tech: ["HTML", "CSS", "JavaScript"],
      client: "로지포커스",
      image: "https://images.unsplash.com/photo-1553413077-190dd305871c?w=800&q=80",
    },
    {
      id: 18,
      title: "g갤러리",
      period: "2020.08 ~ 2021.05",
      description: "갤러리 웹사이트 기획 및 디자인 참여, 반응형 구현",
      tech: ["HTML", "CSS", "JavaScript"],
      client: "삼원특수지",
      image: "https://images.unsplash.com/photo-1561214115-f2f134cc4912?w=800&q=80",
    },
  ];

  const cardVariants = {
    hidden: { opacity: 0, y: 50 },
    visible: (index: number) => ({
      opacity: 1,
      y: 0,
      transition: {
        delay: index * 0.1,
        duration: 0.5,
      },
    }),
  };

  return (
    <section id="projects" className="py-20 bg-gray-50 dark:bg-gray-900">
      <div className="container mx-auto px-6">
        <motion.h2
          className="text-4xl font-bold text-center mb-12 text-gray-900 dark:text-white"
          initial={{ opacity: 0, y: -20 }}
          whileInView={{ opacity: 1, y: 0 }}
          viewport={{ once: true }}
          transition={{ duration: 0.6 }}
        >
          Projects
        </motion.h2>
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          {projects.map((project, index) => (
            <motion.div
              key={project.id}
              custom={index}
              variants={cardVariants}
              initial="hidden"
              whileInView="visible"
              viewport={{ once: true, margin: "-100px" }}
              whileHover={{ y: -10, transition: { duration: 0.3 } }}
              className="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden hover:shadow-2xl transition-shadow"
            >
              <motion.div
                className="h-48 relative overflow-hidden bg-gradient-to-br from-blue-400 via-purple-500 to-pink-500"
                whileHover={{ scale: 1.05 }}
                transition={{ duration: 0.3 }}
              >
                <img
                  src={project.image}
                  alt={project.title}
                  className="w-full h-full object-cover"
                />
                <div className="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent flex items-end p-4">
                  <div className="text-white text-sm font-semibold opacity-90">
                    {project.client}
                  </div>
                </div>
              </motion.div>
              <div className="p-6">
                <div className="flex items-center justify-between mb-2">
                  <h3 className="text-xl font-semibold text-gray-900 dark:text-white">
                    {project.title}
                  </h3>
                </div>
                <p className="text-sm text-gray-500 dark:text-gray-400 mb-2">
                  {project.period}
                </p>
                <p className="text-sm text-blue-600 dark:text-blue-400 mb-3 font-semibold">
                  {project.client}
                </p>
                <p className="text-gray-600 dark:text-gray-300 mb-4 line-clamp-3">
                  {project.description}
                </p>
                <div className="flex flex-wrap gap-2">
                  {project.tech.map((tech, techIndex) => (
                    <motion.span
                      key={techIndex}
                      className="px-3 py-1 bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200 text-sm rounded-full"
                      whileHover={{ scale: 1.1 }}
                      transition={{ duration: 0.2 }}
                    >
                      {tech}
                    </motion.span>
                  ))}
                </div>
              </div>
            </motion.div>
          ))}
        </div>
      </div>
    </section>
  );
}
