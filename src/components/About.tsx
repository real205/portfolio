"use client";

import { motion } from "framer-motion";
import { BarChart3 } from "lucide-react";

export default function About() {
  const stats = [
    {
      value: "9+",
      label: "Years of Experience",
      desc: "다양한 프론트엔드 프로젝트 경험과 UI/UX 노하우",
    },
    {
      value: "100+",
      label: "Projects Completed",
      desc: "다양한 산업군의 웹서비스 제작 및 유지보수",
    },
  ];

  return (
    <section
      id="about"
      className="relative min-h-screen flex flex-col justify-center bg-black text-white overflow-hidden"
    >
      <div className="max-w-7xl mx-auto w-full px-4 sm:px-6 py-16 sm:py-20 md:py-24 overflow-hidden">
        {/* Title */}
        <motion.div
          initial={{ opacity: 0, y: 20 }}
          whileInView={{ opacity: 1, y: 0 }}
          transition={{ duration: 0.6 }}
          viewport={{ once: true }}
          className="mb-10 sm:mb-12 md:mb-16 lg:mb-20"
        >
          <h2 className="barlow-condensed-medium uppercase text-4xl sm:text-6xl md:text-7xl lg:text-8xl xl:text-9xl leading-none font-extrabold uppercase mb-3 sm:mb-4 md:mb-6 break-words">
            About Me
          </h2>
          <p className="text-sm sm:text-base md:text-lg text-gray-300 max-w-2xl leading-relaxed">
            사용자 중심의 경험을 설계하고 React · Next.js를 기반으로
            퍼포먼스와 구조적인 완성도를 추구하는 프론트엔드 개발자{" "}
            <span className="font-semibold text-white">한상헌</span>입니다.
          </p>
        </motion.div>

        {/* Stats + Animated Graph */}
        <div className="grid grid-cols-1 md:grid-cols-3 gap-6 sm:gap-8 md:gap-12 items-center text-center">
          {stats.map((s, i) => (
            <motion.div
              key={i}
              initial={{ opacity: 0, y: 20 }}
              whileInView={{ opacity: 1, y: 0 }}
              transition={{ delay: i * 0.2 }}
              viewport={{ once: true }}
              className="flex flex-col items-center justify-center md:border-l border-gray-700 md:first:border-0"
            >
              <div className="text-5xl sm:text-6xl md:text-7xl lg:text-8xl xl:text-9xl font-extrabold text-white leading-none">
                {s.value}
              </div>
              <div className="text-sm sm:text-base md:text-lg lg:text-xl font-semibold mt-2 sm:mt-3 text-gray-200">
                {s.label}
              </div>
              <p className="text-xs sm:text-sm text-gray-400 mt-1 sm:mt-2 px-4">{s.desc}</p>
            </motion.div>
          ))}

          {/* Animated Growth Graph */}
          <motion.div
            initial={{ opacity: 0, y: 20 }}
            whileInView={{ opacity: 1, y: 0 }}
            transition={{ delay: 0.6 }}
            viewport={{ once: true }}
            className="flex flex-col items-center justify-center border-l border-gray-700"
          >
            <BarChart3 className="w-16 h-16 text-white mb-4" />
            <h3 className="text-xl font-semibold text-gray-200 mb-2">
              지속적인 기술 성장
            </h3>
            <p className="text-sm text-gray-400 mb-4">
              React · Next.js · TypeScript 중심 확장
            </p>

            {/* Graph Bars */}
            <div className="flex items-end justify-center gap-2 h-32">
              {[60, 80, 100].map((height, i) => (
                <motion.div
                  key={i}
                  initial={{ height: 0 }}
                  whileInView={{ height: `${height}%` }}
                  transition={{ duration: 1, delay: i * 0.2 }}
                  viewport={{ once: true }}
                  className="w-6 bg-gradient-to-t from-gray-700 to-white rounded-t-lg"
                />
              ))}
            </div>
          </motion.div>
        </div>

        {/* Footer + Partner Logos */}
        <motion.div
          initial={{ opacity: 0, y: 30 }}
          whileInView={{ opacity: 1, y: 0 }}
          transition={{ delay: 0.8 }}
          viewport={{ once: true }}
          className="mt-24 text-center"
        >
          <p className="text-gray-400 text-sm mb-2">
            A Trusted Frontend Partner by KR Leading Companies
          </p>
          <h3 className="text-2xl font-semibold text-white mb-10">
            국내 주요 기업들이 함께한 개발 파트너
          </h3>

          {/* Partner Logos */}
          <div className="flex flex-wrap justify-center items-center gap-20 opacity-80 bg-white py-10 rounded-2xl">
            <img
              src="/images/samsung.svg"
              alt="Samsung"
              className="max-h-12 w-full sm:max-w-[180px]"
            />
            <img
              src="/images/lgensol.png"
              alt="LG Energy Solution"
              className="max-h-12 w-[80%] sm:max-w-[180px]"
            />
            <img
              src="/images/skcnc.png"
              alt="SK C&C"
              className="max-h-[130px] w-auto sm:max-w-[180px] sm:max-h-[110px]"
            />

          </div>
        </motion.div>
      </div>
    </section>
  );
}
