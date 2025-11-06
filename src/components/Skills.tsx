"use client";

import { motion } from "framer-motion";
import { useEffect } from "react";

export default function Skills() {
  const skills = [
    { name: "React", level: 90, color: "from-blue-400 to-indigo-600" },
    { name: "Next.js", level: 85, color: "from-gray-700 to-black" },
    { name: "TypeScript", level: 88, color: "from-cyan-400 to-blue-500" },
    { name: "Tailwind CSS", level: 80, color: "from-purple-400 to-pink-500" },
    { name: "HTML/CSS", level: 98, color: "from-yellow-400 to-orange-500" },
    { name: "Node.js", level: 70, color: "from-green-400 to-emerald-500" },
  ];

  return (
    <section
      id="skills"
      className="relative min-h-screen flex items-center justify-center bg-gradient-to-b from-gray-100 to-gray-200 dark:from-gray-900 dark:to-gray-950 overflow-hidden"
    >
      {/* 배경 데코 */}
      <div className="absolute w-[800px] h-[800px] bg-gradient-to-r from-blue-500 to-purple-600 rounded-full blur-[180px] opacity-20 top-[-200px] left-[-200px]" />
      <div className="absolute w-[600px] h-[600px] bg-gradient-to-r from-pink-400 to-yellow-400 rounded-full blur-[160px] opacity-10 bottom-[-150px] right-[-150px]" />

      <motion.div
        className="container mx-auto px-6 relative z-10"
        initial={{ opacity: 0, scale: 0.95, y: 40 }}
        whileInView={{ opacity: 1, scale: 1, y: 0 }}
        viewport={{ once: true }}
        transition={{ duration: 0.8, ease: "easeOut" }}
      >
        {/* 타이틀 */}
        <motion.h2
          className="barlow-condensed-medium uppercase text-6xl sm:text-8xl md:text-9xl lg:text-[160px] xl:text-[200px] text-center mb-12 sm:mb-16 text-transparent bg-clip-text bg-gradient-to-r from-blue-500 to-purple-500 drop-shadow-xl"
          initial={{ opacity: 0, y: -40 }}
          whileInView={{ opacity: 1, y: 0 }}
          viewport={{ once: true }}
          transition={{ duration: 0.8 }}
        >
          Skills
        </motion.h2>

        {/* 스킬 카드들 */}
        <div className="grid grid-cols-1 md:grid-cols-2 gap-6 sm:gap-8 md:gap-10 max-w-5xl mx-auto px-4 sm:px-0">
          {skills.map((s, i) => (
            <motion.div
              key={s.name}
              initial={{ opacity: 0, y: 40 }}
              whileInView={{ opacity: 1, y: 0 }}
              viewport={{ once: true }}
              transition={{ delay: i * 0.08, duration: 0.6 }}
              className="p-4 sm:p-6 rounded-2xl bg-white/80 dark:bg-gray-800/60 backdrop-blur-md shadow-xl hover:shadow-2xl transition-all duration-300 border border-gray-200 dark:border-gray-700"
            >
              <div className="flex items-center justify-between mb-3 sm:mb-4">
                <h3 className="barlow-condensed-medium text-xl sm:text-2xl font-bold text-gray-900 dark:text-white">
                  {s.name}
                </h3>
                <span className="text-base sm:text-lg text-gray-500 dark:text-gray-300">
                  {s.level}%
                </span>
              </div>

              <motion.div
                className="w-full h-4 bg-gray-200 dark:bg-gray-700 rounded-full overflow-hidden"
                initial={{ width: 0 }}
                whileInView={{ width: `${s.level}%` }}
                transition={{ duration: 1.2, ease: "easeOut" }}
                viewport={{ once: true }}
              >
                <div
                  className={`h-4 bg-gradient-to-r ${s.color} rounded-full shadow-inner`}
                />
              </motion.div>
            </motion.div>
          ))}
        </div>

        {/* 설명 */}
        <motion.div
          className="mt-16 max-w-3xl mx-auto text-center text-gray-600 dark:text-gray-300 text-lg"
          initial={{ opacity: 0, y: 20 }}
          whileInView={{ opacity: 1, y: 0 }}
          viewport={{ once: true }}
          transition={{ duration: 0.8 }}
        >
          <p className="mb-3">
            ⚙️ 사용 도구: Git · Figma · CI/CD · Visual Studio · FileZilla
          </p>
          <p className="text-base opacity-90">
            프로젝트 상황에 맞는 스택 선택과 빠른 프로토타이핑을 선호합니다.
          </p>
        </motion.div>
      </motion.div>
    </section>
  );
}
