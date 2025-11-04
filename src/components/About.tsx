"use client";

import { motion } from "framer-motion";

export default function About() {
  const cardVariants = {
    hidden: { opacity: 0, scale: 0.9 },
    visible: (index: number) => ({
      opacity: 1,
      scale: 1,
      transition: {
        delay: index * 0.1,
        duration: 0.5,
      },
    }),
  };

  const listItemVariants = {
    hidden: { opacity: 0, x: -20 },
    visible: (index: number) => ({
      opacity: 1,
      x: 0,
      transition: {
        delay: index * 0.1,
        duration: 0.5,
      },
    }),
  };

  return (
    <section id="about" className="py-20 bg-white dark:bg-gray-800">
      <div className="container mx-auto px-6">
        <motion.h2
          className="text-4xl font-bold text-center mb-12 text-gray-900 dark:text-white"
          initial={{ opacity: 0, y: -20 }}
          whileInView={{ opacity: 1, y: 0 }}
          viewport={{ once: true }}
          transition={{ duration: 0.6 }}
        >
          About Me
        </motion.h2>
        <div className="max-w-4xl mx-auto">
          <motion.p
            className="text-lg text-gray-600 dark:text-gray-300 mb-6"
            initial={{ opacity: 0, y: 20 }}
            whileInView={{ opacity: 1, y: 0 }}
            viewport={{ once: true }}
            transition={{ duration: 0.6, delay: 0.2 }}
          >
            안녕하세요! 9년 이상의 경력을 보유한 프론트엔드 개발자 한상헌입니다.
          </motion.p>
          <motion.p
            className="text-lg text-gray-600 dark:text-gray-300 mb-6"
            initial={{ opacity: 0, y: 20 }}
            whileInView={{ opacity: 1, y: 0 }}
            viewport={{ once: true }}
            transition={{ duration: 0.6, delay: 0.3 }}
          >
            삼성, LG, SK와 같은 대기업 프로젝트부터 스타트업까지 다양한 규모의 웹사이트 구축 및 운영 경험을 가지고 있습니다.
            특히 React, Next.js, TypeScript 기반의 모던 웹 애플리케이션 개발과 UI/UX 설계에 강점을 가지고 있습니다.
          </motion.p>
          <div className="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
            {[
              { title: "소속", content: "비스톤스 (선임)" },
              { title: "경력", content: "9년 4개월\n(2016 ~ 현재)" },
              { title: "학력", content: "한국방송통신대학교\n컴퓨터과학과" },
            ].map((item, index) => (
              <motion.div
                key={index}
                custom={index}
                variants={cardVariants}
                initial="hidden"
                whileInView="visible"
                viewport={{ once: true }}
                whileHover={{ scale: 1.05, y: -5 }}
                className="p-6 bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-700 dark:to-gray-600 rounded-lg shadow-md"
              >
                <h3 className="text-xl font-semibold mb-2 text-gray-900 dark:text-white">
                  {item.title}
                </h3>
                <p className="text-gray-600 dark:text-gray-300 whitespace-pre-line">
                  {item.content}
                </p>
              </motion.div>
            ))}
          </div>
          <motion.div
            className="mt-8 p-6 bg-gradient-to-br from-blue-50 to-purple-50 dark:from-gray-700 dark:to-blue-900/30 rounded-lg shadow-md"
            initial={{ opacity: 0, y: 30 }}
            whileInView={{ opacity: 1, y: 0 }}
            viewport={{ once: true }}
            transition={{ duration: 0.6, delay: 0.4 }}
          >
            <h3 className="text-xl font-semibold mb-4 text-gray-900 dark:text-white">
              주요 전문 분야
            </h3>
            <ul className="space-y-2 text-gray-600 dark:text-gray-300">
              {[
                "React, Next.js 기반 웹 애플리케이션 개발",
                "TypeScript를 활용한 타입 안정성 있는 코드 작성",
                "컴포넌트 구조 설계 및 UI/UX 개발",
                "반응형 웹 퍼블리싱 및 크로스 브라우징",
                "프로젝트 리딩 및 팀 협업",
              ].map((skill, index) => (
                <motion.li
                  key={index}
                  custom={index}
                  variants={listItemVariants}
                  initial="hidden"
                  whileInView="visible"
                  viewport={{ once: true }}
                  className="flex items-start"
                >
                  <span className="text-blue-600 mr-2">▪</span>
                  {skill}
                </motion.li>
              ))}
            </ul>
          </motion.div>
        </div>
      </div>
    </section>
  );
}
