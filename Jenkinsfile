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
        gitCredentialsId = '09519a13-6423-47c6-86e7-d72a271378df'
        BUILDER = '192.168.110.141'
        REGISTRY = '192.168.110.142:5000'
        PLAT_ENV = 'production'
        PROJECT_KEY = 
    }
    stages {
        stage('Init') {
            steps {
                script {
                    loadEnvironmentVariablesFromFile("env/${env.PLAT_ENV}")
                    env.IMAGE_NAME = "${env.REGISTRY}/${env.PROJECT_KEY}:${env.GIT_COMMIT}"
                    dir('build/config') {
                        checkout([
                            $class: 'GitSCM',
                            branches: [[name: "refs/tags/${CONFIG_VERSION}"]],
                            doGenerateSubmoduleConfigurations: false,
                            userRemoteConfigs: [[credentialsId: "${env.gitCredentialsId}", url: "ssh://git@192.168.110.142:7999/${env.PROJECT_KEY}/config.git"]]
                        ])
                    }
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
