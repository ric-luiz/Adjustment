#
#--------------------------------------------------------------------------
# Image Setup
#--------------------------------------------------------------------------
#
# To edit the 'php-fpm' base Image, visit its repository on Github
#    https://github.com/Laradock/php-fpm
#
# To change its version, see the available Tags on the Docker Hub:
#    https://hub.docker.com/r/laradock/php-fpm/tags/
#
# Note: Base Image name format {image-tag}-{php-version}
#

ARG LARADOCK_PHP_VERSION

FROM laradock/php-fpm:2.2-7.2

LABEL maintainer="Ricardo Luiz <ricardoluiz508@gmail.com>"

ARG LARADOCK_PHP_VERSION

# Set Environment Variables
ENV DEBIAN_FRONTEND noninteractive

# always run apt update when start and after add new source list, then clean up at end.
RUN apt-get update -yqq && \
    apt-get install -y apt-utils && \
    pecl channel-update pecl.php.net

###########################################################################
# Check PHP version:
###########################################################################

RUN php -v | head -n 1 | grep -q "PHP 7.2."

#
#--------------------------------------------------------------------------
# Final Touch
#--------------------------------------------------------------------------
#

#COPY --chown=www-data /configuration-dockerfile/php-fpm/laravel.ini /usr/local/etc/php/conf.d
#COPY --chown=www-data /configuration-dockerfile/php-fpm/xlaravel.pool.conf /usr/local/etc/php-fpm.d/

#copiando o codigo fonte para dentro do conteiner
#COPY --chown=www-data ./web/ /var/www

#copiando para o conteiner o arquivo de configuração
#COPY --chown=www-data /configuration-dockerfile/php-fpm/php7.2.ini  /usr/local/etc/php/php.ini

USER root

# Clean up
RUN apt-get clean && \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* && \
    rm /var/log/lastlog /var/log/faillog

RUN usermod -u 1000 www-data

WORKDIR /var/www

CMD ["php-fpm"]

EXPOSE 9000
