"use client";

import { motion } from "framer-motion";

export default function Skills() {
  const skillCategories = [
    {
      category: "Frontend Framework",
      skills: ["React", "Next.js", "TypeScript", "JavaScript (ES6+)"],
      color: "from-blue-400 to-cyan-400",
    },
    {
      category: "Markup & Styling",
      skills: ["HTML5", "CSS3", "Tailwind CSS", "SCSS", "반응형 웹"],
      color: "from-purple-400 to-pink-400",
    },
    {
      category: "Backend & Template",
      skills: ["Node.js", "EJS", "PHP"],
      color: "from-green-400 to-teal-400",
    },
    {
      category: "CMS & Platform",
      skills: ["고도몰", "그누보드", "WordPress"],
      color: "from-orange-400 to-red-400",
    },
    {
      category: "Development Tools",
      skills: ["Git", "GitHub", "VS Code", "Figma"],
      color: "from-yellow-400 to-orange-400",
    },
    {
      category: "Skills",
      skills: ["UI/UX 설계", "컴포넌트 설계", "크로스 브라우징", "프로젝트 리딩"],
      color: "from-indigo-400 to-purple-400",
    },
  ];

  const containerVariants = {
    hidden: { opacity: 0 },
    visible: {
      opacity: 1,
      transition: {
        staggerChildren: 0.1,
      },
    },
  };

  const itemVariants = {
    hidden: { opacity: 0, y: 20 },
    visible: {
      opacity: 1,
      y: 0,
      transition: {
        duration: 0.5,
      },
    },
  };

  return (
    <section id="skills" className="py-20 bg-white dark:bg-gray-800">
      <div className="container mx-auto px-6">
        <motion.h2
          className="text-4xl font-bold text-center mb-12 text-gray-900 dark:text-white"
          initial={{ opacity: 0, y: -20 }}
          whileInView={{ opacity: 1, y: 0 }}
          viewport={{ once: true }}
          transition={{ duration: 0.6 }}
        >
          Skills
        </motion.h2>
        <motion.div
          className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto"
          variants={containerVariants}
          initial="hidden"
          whileInView="visible"
          viewport={{ once: true, margin: "-100px" }}
        >
          {skillCategories.map((category, index) => (
            <motion.div
              key={index}
              variants={itemVariants}
              whileHover={{ scale: 1.05, y: -5 }}
              className="p-6 bg-gradient-to-br from-gray-50 to-white dark:from-gray-700 dark:to-gray-600 rounded-lg shadow-lg hover:shadow-2xl transition-shadow relative overflow-hidden"
            >
              {/* Gradient accent */}
              <div
                className={`absolute top-0 left-0 right-0 h-1 bg-gradient-to-r ${category.color}`}
              />

              <h3 className="text-xl font-semibold mb-4 text-gray-900 dark:text-white">
                {category.category}
              </h3>
              <ul className="space-y-2">
                {category.skills.map((skill, skillIndex) => (
                  <motion.li
                    key={skillIndex}
                    className="text-gray-600 dark:text-gray-300 flex items-center"
                    initial={{ opacity: 0, x: -10 }}
                    whileInView={{ opacity: 1, x: 0 }}
                    viewport={{ once: true }}
                    transition={{ delay: skillIndex * 0.05 }}
                    whileHover={{ x: 5 }}
                  >
                    <motion.span
                      className="w-2 h-2 bg-blue-600 rounded-full mr-2"
                      whileHover={{ scale: 1.5 }}
                    />
                    {skill}
                  </motion.li>
                ))}
              </ul>
            </motion.div>
          ))}
        </motion.div>
      </div>
    </section>
  );
}
