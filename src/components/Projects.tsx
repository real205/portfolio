"use client";

import { useLayoutEffect, useRef } from "react";
import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

gsap.registerPlugin(ScrollTrigger);

export default function Projects() {
  const sectionRef = useRef<HTMLDivElement>(null);
  const horizontalRef = useRef<HTMLDivElement>(null);

  useLayoutEffect(() => {
    const section = sectionRef.current;
    const horizontal = horizontalRef.current;
    if (!section || !horizontal) return;

    const totalWidth =
      horizontal.scrollWidth - document.documentElement.clientWidth;

    const ctx = gsap.context(() => {
      gsap.to(horizontal, {
        x: () => -totalWidth,
        ease: "none",
        scrollTrigger: {
          trigger: section,
          start: "top top",
          end: () => `+=${totalWidth}`,
          pin: true,
          scrub: true,
          anticipatePin: 1,
        },
      });
    }, section);

    return () => ctx.revert();
  }, []);

  return (
    <section
      ref={sectionRef}
      id="projects"
      className="relative bg-gray-50 dark:bg-gray-900 text-white h-full"
    >
      {/* 상단 고정 타이틀 */}
      <div className="w-full bg-gray-50/90 dark:bg-gray-900/90 backdrop-blur-sm overflow-hidden">
        <h2 className="barlow-condensed-medium uppercase text-4xl sm:text-6xl md:text-7xl lg:text-8xl xl:text-9xl px-4 sm:px-6 md:px-10 pt-20 sm:pt-24 md:pt-32 lg:pt-40 pb-8 sm:pb-12 md:pb-16 lg:pb-20 font-extrabold text-gray-900 dark:text-white opacity-60 break-words">
          Projects
        </h2>
      </div>

      {/* 가로 스크롤 영역 */}
      <div ref={horizontalRef} className="flex items-center px-4 sm:px-6 md:px-10">
        {projects.map((project) => (
          <div
            key={project.id}
            className="shrink-0 w-[85vw] sm:w-[75vw] md:w-[65vw] lg:w-[55vw] bg-white dark:bg-gray-800 rounded-2xl shadow-2xl overflow-hidden mx-[2vw] sm:mx-[3vw]"
          >
            <div className="relative h-[40vh] sm:h-[45vh] md:h-[50vh] lg:h-[55vh] overflow-hidden">
              <img
                src={project.image}
                alt={project.title}
                className="w-full h-full object-cover"
              />
              <div className="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent flex items-end p-4 sm:p-6 md:p-8">
                <div className="w-full">
                  <div className="text-xs sm:text-sm text-white/80 mb-1">
                    {project.client}
                  </div>
                  <h3 className="text-lg sm:text-xl md:text-2xl lg:text-3xl font-extrabold text-white leading-tight mb-2 break-words">
                    {project.title}
                  </h3>
                  <p className="text-xs sm:text-sm text-white/70 mt-2 sm:mt-3 max-w-lg line-clamp-2 sm:line-clamp-3">
                    {project.description}
                  </p>
                  <div className="mt-2 sm:mt-3 md:mt-4 flex flex-wrap gap-1.5 sm:gap-2">
                    {project.tech.map((tech, i) => (
                      <span
                        key={i}
                        className="px-2 sm:px-3 py-0.5 sm:py-1 bg-white/10 text-white text-xs sm:text-sm rounded-full"
                      >
                        {tech}
                      </span>
                    ))}
                  </div>
                  <p className="text-white/50 mt-2 sm:mt-3 md:mt-4 text-xs">
                    {project.period}
                  </p>
                </div>
              </div>
            </div>
          </div>
        ))}
      </div>
    </section>
  );
}

const projects = [
  {
    id: 1,
    title: "LG 에너지솔루션 비셀체크 어드민",
    period: "2025.07 ~ 2025.10",
    description:
      "React 기반 어드민 시스템 구축 및 컴포넌트 구조 설계. PL로서 프로젝트 전체를 리딩하며 효율적인 개발 환경 구축",
    tech: ["React", "Next.js", "TypeScript", "Tailwind CSS"],
    client: "LG에너지솔루션",
    image:
      "https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=800&q=80",
  },
  {
    id: 2,
    title: "삼성 갤럭시 스튜디오",
    period: "2025.03 ~ 2025.04",
    description:
      "갤럭시 신제품 및 캠퍼스 프로모션 웹사이트 구축 및 운영 (PC, MOBILE)",
    tech: ["HTML", "CSS", "JavaScript"],
    client: "PTKOREA",
    image:
      "https://images.unsplash.com/photo-1516321318423-f06f85e504b3?w=800&q=80",
  },
  {
    id: 3,
    title: "SK C&C AI 포털 구축",
    period: "2025.01 ~ 2025.02",
    description: "EJS 기반 AI 포털 웹사이트 구축 및 컴포넌트 개발",
    tech: ["EJS", "Node.js", "JavaScript"],
    client: "SK C&C",
    image:
      "https://images.unsplash.com/photo-1677442136019-21780ecad995?w=800&q=80",
  },
  {
    id: 4,
    title: "빅터 인터트레이드",
    period: "2024.11 ~ 2024.12",
    description: "기업 웹사이트 UI 설계 및 퍼블리싱",
    tech: ["HTML", "CSS", "JavaScript"],
    client: "드래프트",
    image:
      "https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?w=800&q=80",
  },
  {
    id: 5,
    title: "빅토리 딜리버리",
    period: "2023.01 ~ 2025.05",
    description: "React 기반 배송 플랫폼 웹사이트 신규 구축 및 컴포넌트 개발",
    tech: ["React", "JavaScript"],
    client: "로지포커스",
    image:
      "https://images.unsplash.com/photo-1553413077-190dd305871c?w=800&q=80",
  },
  {
    id: 6,
    title: "컨비니 재팬 몰",
    period: "2023.01 ~ 2023.06",
    description: "고도몰 활용 일본 의류 전문 쇼핑몰 구축 및 반응형 구현",
    tech: ["고도몰", "HTML", "CSS", "JavaScript"],
    client: "로지포커스",
    image:
      "https://images.unsplash.com/photo-1561214115-f2f134cc4912?w=800&q=80",
  }
];
