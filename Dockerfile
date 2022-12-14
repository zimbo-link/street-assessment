FROM ghcr.io/zimbo-link/base-images/base-nginx-fpm-8.1-secure:generic AS site-base

ARG repman_token
ENV REPMAN_TOKEN=$repman_token

COPY . /srv

RUN mv /srv/startup.sh /usr/local/bin/custom-start

#RUN composer config --global --auth http-basic.twothreebird.repo.repman.io token $REPMAN_TOKEN 

RUN chown -R www-data:www-data /srv/bootstrap /srv/storage


FROM site-base as site-dev
RUN composer install --no-scripts --no-interaction

RUN mv /etc/nginx/sites.available/default-dev.conf /etc/nginx/conf.d/default.conf


FROM site-base AS site-prod
RUN composer install --no-scripts --no-interaction --no-dev

RUN mv /etc/nginx/sites.available/default-prod.conf /etc/nginx/conf.d/default.conf

#RUN chmod -R 755 /srv/storage/app/public/ /srv/storage/app/brand/ /srv/storage/framework/ /srv/storage/logs/ /srv/bootstrap/cache/