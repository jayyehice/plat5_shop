private void loadEnvironmentVariablesFromFile(String path) {
    def file = readFile(path)
    file.split('\n').each { envLine ->
        def (key, value) = envLine.tokenize('=')
        env."${key}" = "${value}"
    }
}
pipeline {
    agent { label env.BUILDER }
    options {
        buildDiscarder logRotator(
            artifactDaysToKeepStr: '',
            artifactNumToKeepStr: '',
            daysToKeepStr: '14',
            numToKeepStr: ''
        )
    }
    environment {
        gitCredentialsId = 'b1a0e063-e6a0-4219-ba6f-e693bed1c895'
        BUILDER = '192.168.110.141'
        REGISTRY = '192.168.110.142:5000'
        PROJECT_KEY = ''
    }
    stages {
        stage('Init') {
            steps {
                script {
                    env.IMAGE_NAME = "${env.REGISTRY}/${env.PROJECT_KEY}:${env.GIT_COMMIT}"
                }
            }
        }
        stage('Build') {
            steps {
                script {
                    sh "docker build -t ${env.IMAGE_NAME} ."
                }
            }
        }
        stage('Push') {
            steps {
                script {
                    sh "docker push ${env.IMAGE_NAME}"
                }
            }
        }
    }
}
