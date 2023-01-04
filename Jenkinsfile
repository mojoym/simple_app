pipeline{
  agent any
  stages {
      stage ('Build and Deploy'){
          steps {
              sh "chmod +x -R ${env.WORKSPACE}"
              sh './myscript.sh'
          }
      }      
  }
}
