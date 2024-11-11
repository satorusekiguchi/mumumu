const fs = require('fs');
const path = require('path');
const { execSync } = require('child_process');

function troubleshootNextJs() {
  console.log('Next.js Troubleshooter\n');

  // Check package.json
  const packageJsonPath = path.join(process.cwd(), 'package.json');
  if (!fs.existsSync(packageJsonPath)) {
    console.error('Error: package.json not found. Make sure you are in the project root directory.');
    return;
  }

  let packageJson = JSON.parse(fs.readFileSync(packageJsonPath, 'utf8'));
  let nextVersion = packageJson.dependencies && packageJson.dependencies.next || packageJson.devDependencies && packageJson.devDependencies.next;

  if (nextVersion) {
    console.log(`Next.js version found in package.json: ${nextVersion}`);
  } else {
    console.log('Next.js is not listed in dependencies or devDependencies in package.json');
    console.log('Installing Next.js, React, and React DOM...');
    try {
      execSync('npm install next@latest react@latest react-dom@latest', { stdio: 'inherit' });
      console.log('Next.js, React, and React DOM have been installed successfully.');
      
      // Update package.json content after installation
      packageJson = JSON.parse(fs.readFileSync(packageJsonPath, 'utf8'));
      nextVersion = packageJson.dependencies && packageJson.dependencies.next || packageJson.devDependencies && packageJson.devDependencies.next;
    } catch (error) {
      console.error('Error installing Next.js:', error.message);
      return;
    }
  }

  // Ensure scripts are correctly set
  if (!packageJson.scripts || !packageJson.scripts.dev || !packageJson.scripts.build || !packageJson.scripts.start) {
    console.log('Updating scripts in package.json...');
    packageJson.scripts = {
      ...packageJson.scripts,
      dev: 'next dev',
      build: 'next build',
      start: 'next start'
    };
    fs.writeFileSync(packageJsonPath, JSON.stringify(packageJson, null, 2));
    console.log('Scripts updated in package.json.');
  }

  // Check next.config.js
  const nextConfigPath = path.join(process.cwd(), 'next.config.js');
  if (!fs.existsSync(nextConfigPath)) {
    console.log('next.config.js not found. Creating a basic configuration...');
    const basicConfig = `
/** @type {import('next').NextConfig} */
const nextConfig = {
  reactStrictMode: true,
}

module.exports = nextConfig
    `;
    fs.writeFileSync(nextConfigPath, basicConfig);
    console.log('next.config.js has been created.');
  } else {
    console.log('next.config.js found.');
  }

  // Check project structure
  const srcAppPath = path.join(process.cwd(), 'src', 'app');
  const pagesPath = path.join(process.cwd(), 'pages');
  if (!fs.existsSync(srcAppPath) && !fs.existsSync(pagesPath)) {
    console.log('Neither src/app nor pages directory found. Creating src/app structure...');
    fs.mkdirSync(srcAppPath, { recursive: true });
    const pageContent = `
export default function Home() {
  return (
    <main>
      <h1>Welcome to my Next.js app</h1>
    </main>
  )
}
    `;
    fs.writeFileSync(path.join(srcAppPath, 'page.tsx'), pageContent);
    console.log('src/app/page.tsx has been created.');
  } else {
    console.log('Project structure seems correct.');
  }

  // Check tsconfig.json
  const tsconfigPath = path.join(process.cwd(), 'tsconfig.json');
  if (!fs.existsSync(tsconfigPath)) {
    console.log('tsconfig.json not found. Creating a basic TypeScript configuration...');
    const basicTsConfig = `
{
  "compilerOptions": {
    "target": "es5",
    "lib": ["dom", "dom.iterable", "esnext"],
    "allowJs": true,
    "skipLibCheck": true,
    "strict": true,
    "forceConsistentCasingInFileNames": true,
    "noEmit": true,
    "esModuleInterop": true,
    "module": "esnext",
    "moduleResolution": "node",
    "resolveJsonModule": true,
    "isolatedModules": true,
    "jsx": "preserve",
    "incremental": true,
    "plugins": [
      {
        "name": "next"
      }
    ],
    "paths": {
      "@/*": ["./src/*"]
    }
  },
  "include": ["next-env.d.ts", "**/*.ts", "**/*.tsx", ".next/types/**/*.ts"],
  "exclude": ["node_modules"]
}
    `;
    fs.writeFileSync(tsconfigPath, basicTsConfig);
    console.log('tsconfig.json has been created.');
  } else {
    console.log('tsconfig.json found.');
  }

  console.log('\nTroubleshooting complete. Please try building your project again with "npx next build".');
  console.log('If the issue persists, make sure to commit and push these changes to your repository.');
}

troubleshootNextJs();