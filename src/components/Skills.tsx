export default function Skills() {
  const skillCategories = [
    {
      category: "Frontend Framework",
      skills: ["React", "Next.js", "TypeScript", "JavaScript (ES6+)"],
    },
    {
      category: "Markup & Styling",
      skills: ["HTML5", "CSS3", "Tailwind CSS", "SCSS", "반응형 웹"],
    },
    {
      category: "Backend & Template",
      skills: ["Node.js", "EJS", "PHP"],
    },
    {
      category: "CMS & Platform",
      skills: ["고도몰", "그누보드", "WordPress"],
    },
    {
      category: "Development Tools",
      skills: ["Git", "GitHub", "VS Code", "Figma"],
    },
    {
      category: "Skills",
      skills: ["UI/UX 설계", "컴포넌트 설계", "크로스 브라우징", "프로젝트 리딩"],
    },
  ];

  return (
    <section id="skills" className="py-20 bg-white dark:bg-gray-800">
      <div className="container mx-auto px-6">
        <h2 className="text-4xl font-bold text-center mb-12 text-gray-900 dark:text-white">
          Skills
        </h2>
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
          {skillCategories.map((category, index) => (
            <div
              key={index}
              className="p-6 bg-gray-50 dark:bg-gray-700 rounded-lg"
            >
              <h3 className="text-xl font-semibold mb-4 text-gray-900 dark:text-white">
                {category.category}
              </h3>
              <ul className="space-y-2">
                {category.skills.map((skill, skillIndex) => (
                  <li
                    key={skillIndex}
                    className="text-gray-600 dark:text-gray-300 flex items-center"
                  >
                    <span className="w-2 h-2 bg-blue-600 rounded-full mr-2"></span>
                    {skill}
                  </li>
                ))}
              </ul>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
}
